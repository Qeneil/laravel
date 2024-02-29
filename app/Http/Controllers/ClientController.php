<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Models\ShippingInfo;
use App\Models\Order;
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
public function deletecart($id) {
   Cart::findOrFail($id)->delete();
    return redirect()->route('addcart');
}
public function getshipping() {
    return view('user.getshipping');
}
public function addshipping(Request $request) {
    ShippingInfo::insert([
        'user_id' => Auth::id(),
        'phone_number' => $request -> phone_number ,
        'city_name' => $request -> city_name,
        'postal_code' => $request -> postal_code,
    ]);
    return redirect()->route('checkout');
}
public function checkout() {
    $userid = Auth::id();
   $cart_item = Cart::where('user_id' , $userid)->get();
   $shipping_address =ShippingInfo::where('user_id' , $userid)->first();

    return view('user.checkout' , compact('cart_item' ,'shipping_address'));
}
public function placeproduct() {
    $userid = Auth::id();
    $shipping_address =ShippingInfo::where('user_id' , $userid)->first();
    $cart_item = Cart::where('user_id' , $userid)->get();
    foreach($cart_item as $item) {
        Order::insert([
            'userid' => $userid ,
            'shipping_phonenumber' => $shipping_address ->phone_number ,
            'shipping_city' => $shipping_address ->city_name ,
            'shipping_postalcode' => $shipping_address ->postal_code ,
            'product_id' => $item -> product_id ,
            'quantity' => $item -> quantity ,
            'total_price' => $item -> price



        ]);
        $id =$item ->id;
        Cart::findOrFail($id)->delete();

    }
    ShippingInfo::where('user_id' , $userid)->first()->delete();
    
    return redirect() ->route('userpendingorder');
}
public function userprofile() {
    return view('user.userprofile');

}
public function userpendingorder() {
    $pending_order  =Order::where('status' , 'pending')->latest()->get();
    return view('user.userpendingorder' , compact('pending_order'));

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
