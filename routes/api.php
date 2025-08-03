<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CompanyAnalystController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



// Product API routes
Route::post('/product/new', [ProductController::class, 'newProduct']);
Route::get('/product/{id}', [ProductController::class, 'getProduct']);
Route::delete('/product/delete/{id}', [ProductController::class, 'deleteProduct']);
Route::post('/product/update/{id}', [ProductController::class, 'updateProduct']);


// Customer API routes
Route::post('/customer', [CustomerController::class, 'create_users']);
Route::get('/customer/{id}', [CustomerController::class, 'getCustomer']);
Route::delete('/customer/delete/{id}', [CustomerController::class, 'deleteCustomer']);
Route::put('/customer/update/{id}', [CustomerController::class, 'updateCustomer']);
