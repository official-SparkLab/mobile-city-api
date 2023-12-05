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
        return response()->json([
            "message" =>"Entry Added Successfully",
            "status" =>"Success",
            "data" => CustomerEnquiry::get()


        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $save=new CustomerEnquiry;
        $save->customer_name=$request->customer_name;
        $save->contact_number=$request->contact_number;
        $save->date=$request->date;
        $save->model_name=$request->model_name;
        $save->save();

        return response()->json([
            "message" =>"Entry Added Successfully",
            "status" =>"Success",
            "data" => CustomerEnquiry::get()


        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(CustomerEnquiry $customerEnquiry)
    {
        return response()->json([
            "message"=>"Entry Added Successfully",
            "status"=>"Success",
            "data"=>$customerEnquiry


        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
            $save=CustomerEnquiry::where("id",$id)->first();
            $save->customer_name = $request->input('customer_name');

            $save->contact_number = $request->input('contact_number');

            $save->date = $request->input('date');

            $save->model_name = $request->input('model_name');


            $save->save();
    
            return response()->json([
                'message' => 'Model Updated Successfully',
                'status' => 'success',
                'data' => CustomerEnquiry::get()
    
            ]);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomerEnquiry $customerEnquiry)
    {
        $customerEnquiry->delete();
        return response()->json([
            "message"=>"Entry Delete Successfully",
            "status"=>"Success",
            "data"=>customerEnquiry::get()
 

        ]);
    }
}
