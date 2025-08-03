<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CompanyAnalystController;

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

route::get('/',[HomeController::class,'index']);

Route::middleware('admin:admin')->group(function (){
    Route::get('admin/login',[AdminController::class, 'loginForm']);
    Route::post('admin/login',[AdminController::class, 'store'])->name('admin.login');
});

Route::middleware([
    'auth:sanctum,admin',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('admin/home', function () {
        return view('admin.home');
    })->name('dashboard')->middleware('auth:admin');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('home/home/userpage', function () {
        return view('home.home.userpage');
    })->name('dashboard');
});


/* HOME CONTROLLER */
route::get('/redirect',[HomeController::class,'redirect']);
route::get('/productpage',[HomeController::class,'productpage']);
route::get('/show_cart',[HomeController::class,'show_cart']);
route::get('/userpage',[HomeController::class,'userpage']);
route::get('/contact',[HomeController::class,'contact']);
route::get('/productdetail/{id}',[HomeController::class,'productdetail']);
route::get('/about',[HomeController::class,'about']);
route::get('/place_order',[HomeController::class,'order']);
route::get('/payment',[HomeController::class,'payment']);
route::post('/cart/{id}',[HomeController::class,'cart']);
route::get('/remove_cart/{id}',[HomeController::class,'remove_cart']);
route::get('/cash_order',[HomeController::class,'cash_order']);
route::get('/card_order',[HomeController::class,'card_order']);
route::get('/view_order',[HomeController::class,'view_order']);
route::get('/cancel_order/{id}',[HomeController::class,'cancel_order']);

/* CATEGORY CONTROLLER */

route::get('/view_category',[CategoryController::class,'view_category']);
route::post('/add_category',[CategoryController::class,'add_category']);
route::get('/delete_category/{id}',[CategoryController::class,'delete_category']);

/* PRODUCT CONTROLLER */

route::get('/view_product',[ProductController::class,'view_product']);
route::post('/add_product',[ProductController::class,'add_product']);
route::get('/show_product',[ProductController::class,'show_product']);
route::get('/delete_product/{id}',[ProductController::class,'delete_product']);
route::get('/edit_product/{id}',[ProductController::class,'edit_product']);
route::post('/edit_product_confirm/{id}',[ProductController::class,'edit_product_confirm']);


/* CUSTOMER CONTROLLER */

route::get('/customer_data',[CustomerController::class,'customer_data']);
route::get('/delete_customer/{id}',[CustomerController::class,'delete_customer']);

/* ORDER CONTROLLER */

route::get('/order',[OrderController::class,'order']);
route::get('/delivered/{id}',[OrderController::class,'delivered']);
route::get('/search',[OrderController::class,'searchdata']);


/* COMPANYANALYST CONTROLLER */

route::get('/admin/home',[CompanyAnalystController::class,'company_analyst']);

// Product API routes
Route::post('/product/new', [ProductController::class, 'newProduct']);
Route::get('/product/{id}', [ProductController::class, 'getProduct']);
Route::delete('/product/delete/{id}', [ProductController::class, 'deleteProduct']);
Route::post('/product/update/{id}', [ProductController::class, 'updateProduct']);

// // Customer API routes
// Route::post('/customer', [CustomerController::class, 'create_users']);
// Route::get('/customer/{id}', [CustomerController::class, 'getCustomer']);
// Route::delete('/customer/delete/{id}', [CustomerController::class, 'deleteCustomer']);
// Route::put('/customer/update/{id}', [CustomerController::class, 'updateCustomer']);



