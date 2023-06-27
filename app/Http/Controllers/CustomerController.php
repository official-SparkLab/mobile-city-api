<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'message' => 'Fetch Successfully',
            'status' => 'success',
            'data' =>Customer::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $save=new Customer;
        $save->customer_name = $request->customer_name;
        $save->contact=$request->contact;
        $save->address=$request->address;

        $save->save();

        return response()->json([
            'message' =>'Customer Saved Successfully',
            'status' =>'Success',
            'data' =>Customer::get()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(customer $customer)
    {
        return response()->json([
            'message' =>'Fetch Successfully',
            'status' => 'success',
            'data' => $customer
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(customer $customer)
    {
        $customer->delete();
        return response()->json([
            'message' => 'Customer Deleted',
            'status' => 'success',
            'data'=>Customer::get()
        ]);
    }
}
