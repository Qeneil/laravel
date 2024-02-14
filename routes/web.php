<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;

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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'adminhome'])
    ->middleware('is_admin')
    ->name('adminhome');// routes/web.php

    
    Route::controller(CategoryController::class)->group(function(){

        Route::get('/addmin/all-category' ,'allcategory' )->name('allcategory');
        Route::get('/addmin/add-category' ,'addcategory' )->name('addcategory');
        Route::post('/addmin/store-category' ,'storecategory' )->name('storecategory');


    });
    Route::controller(SubCategoryController::class)->group(function(){

        Route::get('/addmin/all-subcategory' ,'allsubcategory' )->name('allsubcategory');
        Route::get('/addmin/add-subcategory' ,'addsubcategory' )->name('addsubcategory');

    });
    Route::controller(ProductController::class)->group(function(){

        Route::get('/addmin/all-products' ,'allproduct' )->name('allproduct');
        Route::get('/addmin/add-product' ,'addproduct' )->name('addproduct');

    });
    Route::controller(OrderController::class)->group(function(){

        Route::get('/addmin/pendding-order' ,'pendingorder' )->name('pendingorder');

    });
