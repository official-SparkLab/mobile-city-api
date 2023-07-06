<?php

namespace App\Http\Controllers;

use App\Models\Purchase_Items;
use Illuminate\Http\Request;

class PurchaseItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'message' => 'Fetch Data Successfully',
            'status' => 'success',
            'data' =>Purchase_Items::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $save=new Purchase_Items;
        $save->invoice_no=$request->invoice_no;
        
        $save->model_name=$request->model_name;

        $save->imei=$request->imei;

        $save->purchase_price=$request->purchase_price;

        $save->sale_price=$request->sale_price;
      

        $save->save();

        return response()->json([
            'message' => "Product Added",
            'status' => 'success',
            'data' => Purchase_Items::get()

        ]);



    }

    /**
     * Display the specified resource.
     */
    public function show(Purchase_Items $purchase_Items)
    {
        return response()->json([
            'message' => 'Fetch Data Successfully',
            'status' => 'success',
            'data' =>$purchase_Items
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Purchase_Items $purchase_Items)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Purchase_Items $purchase_Items)
    {
        //
    }
}
