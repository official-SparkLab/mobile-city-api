<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PurchaseDetailsController;
use App\Http\Controllers\PurchaseItemsController;




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
Route::post('/purcahse_details',[PurchaseDetailsController::class,'store']);    
Route::get('/get_all_purchaseDetails',[PurchaseDetailsController::class,'index']);    
Route::get('/get_purchaseDetails/{purchase_Details}',[PurchaseDetailsController::class,'show']);    


//Purchase Items API
Route::post('/purchase_items',[PurchaseItemsController::class,'store']); 
Route::get('/get_all_purchaseItems',[PurchaseItemsController::class,'index']); 
Route::get('/get_purchaseItems/{purchase_Items}',[PurchaseItemsController::class,'show']); 

