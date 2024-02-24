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
        $products = Product::latest()->get();
        return view('allproduct', compact('products'));
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
            'slug' => strtolower(str_replace('','-',$request->product_name)),


        ]);
        Category::where('id',$category_id)->increment('product_count',1);
        Subcategory::where('id',$subcategory_id)->increment('product_count',1);
        return redirect()->route('allproduct')->with('message' , 'add product successfully');

    }
    public function editproductimage($id) {
        $productinfo = Product::findOrFail($id);
        return view('editproductimage' , compact('productinfo'));
    }
    public function updateproductimg(Request $request) {
        $request ->validate([
            'product_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048' ,
        ]);
        $id = $request ->id;
        $image = $request->file('product_img');
        $img_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $request->product_img->move(public_path('upload'),$img_name);
        $img_url ='upload/' .$img_name;

        Product::findOrFail($id)->update([
            'product_img' => $img_url,

        ]);
        return redirect()->route('allproduct')->with('message' , 'update product successfully');



    }

    public function editproduct($id) {
$productinfo = Product::findOrFail($id);
return view('editproduct' , compact ('productinfo'));
    }
    public function  updateproduct(Request $request) {
$productid =$request -> id;
$request ->validate([
    'product_name' => 'required|unique:products' ,
    'price' => 'required',
    'quantity' => 'required' ,
    'product_short_des' => 'required',
    'product_long_des' => 'required' ,
  
]);
Product::findOrFail($productid) ->update([
    'product_name' => $request->product_name,
    'product_short_des' => $request->product_short_des,
    'product_long_des' => $request->product_long_des,
    'price' => $request->price,
    'quantity' => $request->quantity,
    'slug' => strtolower(str_replace('','-',$request->subcategory_name)),

]);
return redirect()->route('allproduct')->with('message' , 'product details update successfully');

    }
    public function deleteproduct($id) {
        Product::findOrFail($id)->delete();
        $categoryid =Product::where('id',$id)->value('product_category_id');
        $subcategoryid =Product::where('id',$id)->value('product_subcatgory_id');
        Category::where('id',$categoryid)->decrement('product_count',1);
        Subcategory::where('id',$subcategoryid)->decrement('product_count',1);
        return redirect()->route('allproduct')->with('message' , 'product delete successfully');



    }

}

