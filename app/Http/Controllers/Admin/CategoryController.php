<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    public function allcategory() {
        $categories = Category::latest()->get();
        return view('allcategory', compact('categories'));
    }

    public function addcategory() {
        return view('addcategory');
    }
    public function storecategory(Request $request){
        $request ->validate([
            'category_name' => 'required|unique:categories'
        ]);

        Category::insert([
            'category_name' => $request->category_name,
            'slug' => strtolower(str_replace('','-',$request->category_name))
        ]);        

        return redirect()->route('allcategory')->with('message' , 'category add successfully');

    }
    public function editcategory($id){
        $category_info = Category::findorFail($id);
        return view('editcategory', compact('category_info'));
    }
    public function updatecategory(Request $request) {
        $category_id =$request ->category_id;
        $request ->validate([
            'category_name' => 'required|unique:categories'
        ]);
        Category::findorFail($category_id)->update([
            'category_name' => $request->category_name ,
            'slug' => strtolower(str_replace(' ' ,'-', $request->category_name))
        ]);
        return redirect()->route('allcategory')->with('message' , 'update successfully');

    }
}
