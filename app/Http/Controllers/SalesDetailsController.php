<?php

namespace App\Http\Controllers;

use App\Models\Sales_Details;
use Illuminate\Http\Request;

class SalesDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'message' =>'Fetch Successfully',
            'status' =>'Success',
            'data' =>Sales_Details::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $save=new Sales_Details;
        $save->invoice_no=$request->invoice_no;
        $save->date=$request->date;

        $save->customer_name=$request->customer_name;
        $save->mobile_no=$request->mobile_no;
        $save->address=$request->address;

        $save->sub_total=$request->sub_total;

        $save->discount=$request->discount;

        $save->grand_total=$request->grand_total;

        $save->payable_amount=$request->payable_amount;

        $save->payment_mode=$request->payment_mode;

        $save->save();

        return response()->json([
            'message' => 'Invoice Generated Successfully',
            'status' => 'success',
            'data' => Sales_Details::get()

        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Sales_Details $sales_Details)
    {
        return response()->json([
            'message' =>'Fetch Successfully',
            'status' =>'Success',
            'data' =>$sales_Details
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sales_Details $sales_Details)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sales_Details $sales_Details)
    {
        //
    }
}
