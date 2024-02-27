<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;


class SubCategoryController extends Controller
{
    public function allsubcategory() {
$allsubcategories =Subcategory::latest()->get();
        return view('allsubcategory' , compact('allsubcategories'));
    }

    public function addsubcategory() {
        $categories = Category::latest()->get();
        return view('addsubcategory',compact('categories'));
    }
    public function storesubcategory(Request $request) {
        $request ->validate([
            'subcategory_name' => 'required|unique:subcategories' ,
            'category_id' => 'required'
        ]);
        $category_id = $request ->category_id;
        $category_name =Category::where('id',$category_id)->value('category_name');
        Subcategory::insert([
            'subcategory_name' => $request->subcategory_name,
            'slug' => strtolower(str_replace('','-',$request->subcategory_name)),
            'category_id' => $category_id ,
            'category_name' =>$category_name
        ]);
        Category::where('id',$category_id)->increment('subcategory_count',1);
        return redirect()->route('allsubcategory');

    }
    public function editsubcategory($id) {
        $subcategoryinfo = Subcategory::findOrFail($id);
        return view('editsubcategory' ,compact('subcategoryinfo'));
    }
  
public function updatesubcategory(Request $request) {
    $request ->validate([
        'subcategory_name' => 'required|unique:subcategories' ,
    ]);
    $subcatid = $request ->subcatid;
    Subcategory::findOrFail($subcatid)->update([
        'subcategory_name' => $request->subcategory_name,
        'slug' => strtolower(str_replace('','-',$request->subcategory_name)),
    ]);
    return redirect()->route('allsubcategory')->with('message' , 'subcategory update successfully');

}
       
    public function deletesubcategory($id) {
        $categoryid =Subcategory::where('id',$id)->value('category_id');
        Subcategory::findOrFail($id)->delete();
        Category::where('id',$categoryid)->decrement('subcategory_count',1);
        
        return redirect()->route('allsubcategory')->with('message' , 'subcategory update successfully');

    }
}

