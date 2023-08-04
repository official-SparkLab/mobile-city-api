<?php

namespace App\Http\Controllers;

use App\Models\brand_details;
use Illuminate\Http\Request;

class BrandDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'message' => 'Fetch Successfully',
            'status' => 'success',
            'data' =>brand_details::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $save=new brand_details;
        $save->invoice_no=$request->invoice_no;
        
        $save->model_name=$request->model_name;

        $save->imei=$request->imei;

        $save->price=$request->price;

      

        $save->save();

        return response()->json([
            'message' => "Product Added",
            'status' => 'success',
            'data' => brand_details::get()

        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(brand_details $brand_details)
    {
        return response()->json([
            'message' => 'Fetch Successfully',
            'status' => 'success',
            'data' =>$brand_details
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, brand_details $brand_details)
    {
        // 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(brand_details $brand_details)
    {
        $brand_details->delete();
        return response()->json([
            "message"=>"Entry Delete Successfully",
            "status"=>"Success",
            "data"=>brand_details::get()
 

        ]);
    }
}
