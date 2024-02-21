<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;


class ProductController extends Controller
{
    public function addproduct() {
        $categories =Category::latest()->get();
        $subcategories = Subcategory::latest()->get();
        return view('addproduct',compact('categories' , 'subcategories'));
    }
    public function allproduct() {
        return view('allproduct');
    }
    public function storeproduct(Request $request) {
        $request ->validate([
            'product_name' => 'required|unique:products' ,
            'price' => 'required',
            'quantity' => 'required' ,
            'product_short_des' => 'required',
            'product_long_des' => 'required' ,
            'product_category_id' => 'required',
            'product_subcatgory_id' => 'required' ,
            'product_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048' ,
        ]);
 
        $image = $request->file('product_img');
        $img_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $request->product_img->move(public_path('upload'),$img_name);
        $img_url ='upload/' .$img_name;

        $category_id = $request ->product_category_id;
        $subcategory_id =$request ->product_subcatgory_id; 

        $category_name =Category::where('id',$category_id)->value('category_name');
        $subcategory_name =Subcategory::where('id',$subcategory_id)->value('subcategory_name');


        Product::insert([
            'product_name' => $request->product_name,
            'product_short_des' => $request->product_short_des,
            'product_long_des' => $request->product_long_des,
            'price' => $request->price,
            'product_category_name' =>  $category_name,
            'product_subcatgory_name' => $subcategory_name,
            'product_category_id' => $request->product_category_id,
            'product_subcatgory_id' => $request->product_subcatgory_id,
            'product_img' => $img_url,
            'quantity' => $request->quantity,
            'slug' => strtolower(str_replace('','-',$request->subcategory_name)),


        ]);
        Category::where('id',$category_id)->increment('product_count',1);
        Subcategory::where('id',$subcategory_id)->increment('product_count',1);
        return redirect()->route('allproduct')->with('message' , 'add product successfully');

    }
}
