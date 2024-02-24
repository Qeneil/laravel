<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ClientController extends Controller

{
public function category($id) {
    $category = Category::findOrFail($id);
    $products = Product::where('product_category_id' , $id)->latest()->get();
    return view('user.category',compact('category' ,'products'));
}
public function singleproduct($id) {
    $product =Product::findOrFail($id);
    $subcategoryid =Product::where('id',$id)->value('product_subcatgory_id');
    $related_products=Product::where('product_subcatgory_id', $subcategoryid) ->latest()->get();
    return view('user.singleproduct',compact('product', 'related_products'));
}
public function addcart() {
    return view('user.addcart');
}
public function checkout() {
    return view('user.checkout');
}
public function userprofile() {
    return view('user.userprofile');

}
public function userpendingorder() {
    return view('user.userpendingorder');

}
public function userhistory() {
    return view('user.userhistory');

}

public function newreal() {
    return view('user.newreal');
}
public function todaydeal() {
    return view('user.todaydeal');
}
public function customerservice() {
    return view('user.customerservice');
}
}
