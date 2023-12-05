<?php

namespace App\Http\Controllers;

use App\Models\CustomerEnquiry;
use Illuminate\Http\Request;

class CustomerEnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $save=new EnquiryDetails;
        $save->customer_name=$request->customer_name;
        $save->contact_number=$request->contact_number;
        $save->date=$request->date;
        $save->model_name=$request->model_name;
        $save->save();

        return response()->json([
            "message" =>"Entry Added Successfully",
            "status" =>"Success",
            "data" => EnquiryDetails::get()


        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(CustomerEnquiry $customerEnquiry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CustomerEnquiry $customerEnquiry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomerEnquiry $customerEnquiry)
    {
        //
    }
}
