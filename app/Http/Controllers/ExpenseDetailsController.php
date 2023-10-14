<?php

namespace App\Http\Controllers;

use App\Models\ExpenseDetails;
use Illuminate\Http\Request;

class ExpenseDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            "message" =>"Entry Added Successfully",
            "status" =>"Success",
            "data" => ExpenseDetails::get()


        ]); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $save=new ExpenseDetails;
        $save->expense_name=$request->expense_name;
        $save->expense_details=$request->expense_details;
        $save->date=$request->date;
        $save->amount=$request->amount;
        $save->description=$request->description;
        $save->save();

        return response()->json([
            "message" =>"Entry Added Successfully",
            "status" =>"Success",
            "data" => ExpenseDetails::get()


        ]); 
    }

    /**
     * Display the specified resource.
     */
    public function show(ExpenseDetails $expenseDetails)
    {
        return response()->json([
            "message"=>"Entry Added Successfully",
            "status"=>"Success",
            "data"=>$expenseDetails


        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        {
            $save=ExpenseDetails::where("id",$id)->first();
            $save->expense_name = $request->input('expense_name');

            $save->expense_details = $request->input('expense_details');

            $save->date = $request->input('date');

            $save->amount = $request->input('amount');

            $save->description = $request->input('description');


            $save->save();
    
            return response()->json([
                'message' => 'Entry Updated Successfully',
                'status' => 'success',
                'data' => ExpenseDetails::get()
    
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExpenseDetails $expenseDetails)
    {
        $expenseDetails->delete();
        return response()->json([
            "message"=>"Entry Delete Successfully",
            "status"=>"Success",
            "data"=>expenseDetails::get()
 

        ]);
    }
}
