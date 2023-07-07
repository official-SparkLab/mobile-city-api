<?php

namespace App\Http\Controllers;

use App\Models\sales_items;
use Illuminate\Http\Request;

class SalesItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'message' =>'Fetch Successfully',
            'status' =>'Success',
            'data' =>sales_items::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $save=new sales_items;
        $save->invoice_no=$request->invoice_no;
       
        $save->model_name=$request->model_name;

        $save->imei=$request->imei;

        $save->price=$request->price;

        $save->accessories=$request->accessories;
        $save->save();

        return response()->json([
            'message' => "Product Added",
            'status' => 'success',
            'data' => sales_items::get()

        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(sales_items $sales_items)
    {
        return response()->json([
            'message' =>'Fetch Successfully',
            'status' =>'Success',
            'data' =>$sales_items
        ]);    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, sales_items $sales_items)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(sales_items $sales_items)
    {
        //
    }
}
