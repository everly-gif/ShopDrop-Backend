<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/users/authenticate', [UserController::class,"tokenAuthentication"]);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/users',UserController::class);
Route::post('/users/login',[UserController::class,'login']);
Route::get("/cart/{id}",[UserProductController::class,'userProducts']);
Route::post("/cart",[UserProductController::class,'store']);
Route::put("/cart/{id}",[UserProductController::class,'update']);
Route::delete("/delete-from-cart/{userid}/{productid}",[UserProductController::class,'removeFromCart']);
Route::put("/cart/update/{id}",[UserProductController::class,'update']);
Route::resource('/categories',CategoryController::class);
Route::resource('/products',ProductController::class);
Route::delete("/clear-cart/{id}",[UserProductController::class,'destroy']);
Route::post('/order',[OrderController::class,'store']);
Route::post('/order-details',[OrderDetailsController::class,'store']);
Route::get('/productswithcart/{id}',[ProductController::class, 'allProducts']);