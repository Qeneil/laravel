<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;

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
        $category_id = $request ->product_category_id;
        $subcategory_id =$request ->product_subcatgory_id; 

        $category_name =Category::where('id',$category_id)->value('category_name');
        $subcategory_name =Subcategory::where('id',$subcategory_id)->value('subcategory_name');

    }
}
