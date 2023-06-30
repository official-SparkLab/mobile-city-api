<?php

namespace App\Http\Controllers;

use App\Models\purchase_Details;
use Illuminate\Http\Request;

class PurchaseDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'message' => 'Fetch Successfully',
            'status' => 'success',
            'data' =>Purchase_Details::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $save=new Purchase_Details;
        $save->invoice_no=$request->invoice_no;
        $save->date=$request->date;

        $save->supplier_id=$request->supplier_id;

        $save->sub_total=$request->sub_total;

        $save->discount=$request->discount;

        $save->grand_total=$request->grand_total;

        $save->payable_amount=$request->payable_amount;

        $save->payment_mode=$request->payment_mode;

        $save->save();

        return response()->json([
            'message' => 'Invoice Generated Successfully',
            'status' => 'success',
            'data' => Purchase_Details::get()

        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(purchase_Details $purchase_Details)
    {
        return response()->json([
            'message' => 'Fetch Successfully',
            'status' => 'success',
            'data' =>$purchase_Details
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, purchase_Details $purchase_Details)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(purchase_Details $purchase_Details)
    {
        
    }
}
