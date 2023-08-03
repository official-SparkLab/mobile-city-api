<?php

namespace App\Http\Controllers;

use App\Models\purchase_payable;
use Illuminate\Http\Request;

class PurchasePayableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            "message" =>"Entry Added Successfully",
            "status" =>"Success",
            "data" => purchase_payable::get()


        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $save=new purchase_payable;
        $save->date=$request->date;

        $save->supplier_name=$request->supplier_name;

        $save->mobile_no=$request->mobile_no;

        $save->address=$request->address;

        $save->pending_amount=$request->pending_amount;

        $save->paid_amountate=$request->paid_amount;

        $save->available_balance=$request->available_balance;

        $save->payment_mode=$request->payment_mode;

        $save->trx_no=$request->trx_no;



       
        $save->save();

        return response()->json([
            "message" =>"Entry Added Successfully",
            "status" =>"Success",
            "data" => purchase_payable::get()


        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(purchase_payable $purchase_payable)
    {
        return response()->json([
            "message" =>"Entry Added Successfully",
            "status" =>"Success",
            "data" => purchase_payable::get()


        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, purchase_payable $purchase_payable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(purchase_payable $purchase_payable)
    {
        $purchase_payable->delete();
        return response()->json([
            "message"=>"Entry Delete Successfully",
            "status"=>"Success",
            "data"=>purchase_payable::get()
 

        ]);
    }
}
