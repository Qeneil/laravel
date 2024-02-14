<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    public function allcategory() {
        return view('allcategory');
    }

    public function addcategory() {
        return view('addcategory');
    }
    public function storecategory(Request $request){
        $request ->validate([
            'category_name' => 'required|unique:categories1'
        ]);

        Category::insert([
            'category_name' => $request->category_name,
            'slug' => strtolower(str_replace('','-',$request->category_name))
        ]);        

        return redirect()->route('allcategory');

    }
}
