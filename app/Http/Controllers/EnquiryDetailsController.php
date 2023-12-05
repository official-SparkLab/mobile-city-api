<?php

namespace App\Http\Controllers;

use App\Models\EnquiryDetails;
use Illuminate\Http\Request;

class EnquiryDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            "message" =>"Entry Added Successfully",
            "status" =>"Success"
            


        ]); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         
    }

    /**
     * Display the specified resource.
     */
    public function show(EnquiryDetails $enquiryDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EnquiryDetails $enquiryDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EnquiryDetails $enquiryDetails)
    {
        //
    }
}
