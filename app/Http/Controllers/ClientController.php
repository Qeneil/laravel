<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;



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
   $userid = Auth::id();
   $cart_item = Cart::where('user_id' , $userid)->get();

    return view('user.addcart', compact('cart_item'));
}
public function addtocart(Request $request) {
    $product_price = $request->price;
    $quantity = $request->quantity;
    $price = $product_price * $quantity;

    if ($request->product_id !== null && $quantity !== null) {
        Cart::insert([
            'product_id' => $request->product_id,
            'user_id' => Auth::id(),
            'quantity' => $request->quantity,
            'price' => $price
        ]);

        return redirect()->route('addcart')->with('message', 'Item added to cart successfully');
    } else {
        // Handle the case where product_id is null
        return redirect()->route('addcart')->with('error', 'Product ID is required');
    }
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
