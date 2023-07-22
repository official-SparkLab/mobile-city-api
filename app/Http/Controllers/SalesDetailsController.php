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
    public function show($invoice_no)
    {
        $search=Sales_Details::where("invoice_no",$invoice_no);
        return response()->json([
            'message' =>'Fetch Successfully',
            'status' =>'Success',
            'data' =>$search->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $invoice_no)
    {
        $save=Sales_Details::where("invoice_no",$invoice_no)->first();
        $save->date = $request->input('date');
        $save->customer_name = $request->input('customer_name');
        $save->mobile_no = $request->input('mobile_no');
        $save->address = $request->input('address');
        $save->sub_total = $request->input('sub_total');
        $save->discount = $request->input('discount');
        $save->grand_total = $request->input('grand_total');
        $save->payable_amount = $request->input('payable_amount');
        $save->payment_mode = $request->input('payment_mode');
        $save->save();

        return response()->json([
            'message' => 'Sales Details Updated',
            'status' => 'success',
            'data' => Sales_Details::get()

        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($invoice_no)
    {
        $delete=Sales_Details::where("invoice_no",$invoice_no)->first();
        $delete->status=0;
        $delete->save();

        return response()->json([
            "message"=>"Purchase Details deleted successfully",
            "status"=>"success",
            "data"=> Sales_Details::get()
        ]);
    }
    public function getInvoice($invoice_no) {
        $Invoice = Sales_Details::join('sales_items', 'sales__details.invoice_no', '=', 'sales_items.invoice_no')
                        ->where('sales__details.invoice_no', $invoice_no)                
                        ->select('sales__details.*', 'sales_items.*')
                        ->get();
        return response()->json([
            'message'=>"Invoice Generated successfully",
            'status'=>'success',
            'data'=>$Invoice
        ]);                
    }
}
