<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PurchaseDetailsController;
use App\Http\Controllers\PurchaseItemsController;
use App\Http\Controllers\SalesDetailsController;
use App\Http\Controllers\SalesItemsController;
use App\Http\Controllers\BrandDetailsController;
use App\Http\Controllers\ModelDetailsController;


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

//Brand Details API
Route::post('/save_brand',[BrandController::class,'store']);
Route::get('/get_brand/{brand}',[BrandController::class,'show']);
Route::get('/get_all_brand',[BrandController::class,'index']);
Route::delete('/delete_brand/{brand}',[BrandController::class,'destroy']);


//Color Details API
Route::post('/save_color',[ColorController::class,'store']);
Route::get('/get_color/{color}',[ColorController::class,'show']);
Route::get('/get_all_color',[ColorController::class,'index']);
Route::delete('/delete_color/{color}',[ColorController::class,'destroy']);

//CUstomer Details API

Route::post('/save_customer',[CustomerController::class,'store']);
Route::get('/get_all_customer',[CustomerController::class,'index']);
Route::get('/get_customer/{customer}',[CustomerController::class,'show']);
Route::delete('/delete_customer/{customer}',[CustomerController::class,'destroy']);


//Purchase Details API
Route::post('/purchase_details',[PurchaseDetailsController::class,'store']);    
Route::get('/get_all_purchaseDetails',[PurchaseDetailsController::class,'index']);    
Route::get('/get_purchaseDetails/{purchase_Details}',[PurchaseDetailsController::class,'show']);    


//Purchase Items API
Route::post('/purchase_items',[PurchaseItemsController::class,'store']); 
Route::get('/get_all_purchaseItems',[PurchaseItemsController::class,'index']); 
Route::get('/get_purchaseItems/{purchase_Items}',[PurchaseItemsController::class,'show']); 

//Sales Detals API
Route::post('/sales_details',[SalesDetailsController::class,'store']);
Route::get('/get_all_salesDetails',[SalesDetailsController::class,'index']);
Route::get('/get_salesDetails/{sales_Details}',[SalesDetailsController::class,'show']);

//Sales Items API
Route::post('/sales_items',[SalesItemsController::class,'store']);
Route::get('/get_all_salesItems',[SalesItemsController::class,'index']);
Route::get('/get_salesItems/{sales_items}',[SalesItemsController::class,'show']);

//returnBrandDetails API
Route::post('/returnBrand',[BrandDetailsController::class,'store']);
Route::get('/get_all_returnBrand',[BrandDetailsController::class,'index']);
Route::get('/get_returnBrand/{brand_details}',[BrandDetailsController::class,'show']);


//Model Details API
Route::post('/save_model',[ModelDetailsController::class,'store']);
Route::get('/get_all_models',[ModelDetailsController::class,'index']);
Route::get('/get_models/{model_details}',[ModelDetailsController::class,'show']);
Route::delete('/delete_model/{model_details}',[ModelDetailsController::class,'destroy']);



