<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\ClientController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//route::get('/' , function() {
    //return view('user.layouts.template');
//});
Route::controller(HomeController::class)->group(function () {
    route::get('/' , 'index')->name('home');
});
Route::controller(ClientController::class)->group(function () {
    route::get('/category/{id}/{slug}' , 'category')->name('category');
    route::get('/product-details/{id}/{slug}' , 'singleproduct')->name('singleproduct');
    route::get('/add-to-cart' , 'addcart')->name('addcart');
    route::post('/add-product-to-cart/' , 'addtocart')->name('addtocart');
    route::get('/get-shipping' , 'getshipping')->name('getshipping');
    route::post('/add-shipping' , 'addshipping')->name('addshipping');
    route::post('/place-product' , 'placeproduct')->name('placeproduct');
    route::get('/checkout' , 'checkout')->name('checkout');
    route::get('/userprofile' , 'userprofile')->name('userprofile');
    route::get('/userprofile/pendingorder' , 'userpendingorder')->name('userpendingorder');
    route::get('/userprofile/history' , 'userhistory')->name('userhistory');
    route::get('/new-real' , 'newreal')->name('newreal');
    route::get('/toay-deal' , 'todaydeal')->name('todaydeal');
    route::get('/customer-service' , 'customerservice')->name('customerservice');
    Route::get('/remove-cart/{id}' ,'deletecart' )->name('deletecart');



});

Auth::routes();

//Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'adminhome'])
    ->middleware('is_admin')
    ->name('adminhome');// routes/web.php

    
    Route::controller(CategoryController::class)->group(function(){

        Route::get('/addmin/all-category' ,'allcategory' )->name('allcategory');
        Route::get('/addmin/add-category' ,'addcategory' )->name('addcategory');
        Route::post('/addmin/store-category' ,'storecategory' )->name('storecategory');
        Route::get('/addmin/edit-category{id}' ,'editcategory' )->name('editcategory');
        Route::post('/addmin/update-category' ,'updatecategory' )->name('updatecategory');
        Route::get('/addmin/delete-category{id}' ,'deletecategory' )->name('deletecategory');



    });
    Route::controller(SubCategoryController::class)->group(function(){

        Route::get('/admin/all-subcategory' ,'allsubcategory' )->name('allsubcategory');
        Route::get('/admin/add-subcategory' ,'addsubcategory' )->name('addsubcategory');
        Route::post('/admin/store-subcategory' ,'storesubcategory' )->name('storesubcategory');
        Route::get('/admin/edit-subcategory/{id}' ,'editsubcategory' )->name('editsubcategory');
        Route::get('/admin/delete-subcategory/{id}' ,'deletesubcategory' )->name('deletesubcategory');
        Route::post('/admin/updatesubcategory' ,'updatesubcategory' )->name('updatesubcategory');

    });
    Route::controller(ProductController::class)->group(function(){

        Route::get('/addmin/all-products' ,'allproduct' )->name('allproduct');
        Route::get('/addmin/add-product' ,'addproduct' )->name('addproduct');
        Route::post('/addmin/store_product' ,'storeproduct' )->name('storeproduct');
        Route::get('/addmin/edit-product-img/{id}' ,'editproductimage' )->name('editproductimage');
        Route::post('/addmin/update-product-img' ,'updateproductimg' )->name('updateproductimg');
        Route::get('/addmin/edit-product-details/{id}' ,'editproduct' )->name('editproduct');
        Route::post('/addmin/update-product' ,'updateproduct' )->name('updateproduct');
        Route::get('/addmin/delete-product/{id}' ,'deleteproduct' )->name('deleteproduct');

    });
    Route::controller(OrderController::class)->group(function(){

        Route::get('/addmin/pendding-order' ,'pendingorder' )->name('pendingorder');

    });
