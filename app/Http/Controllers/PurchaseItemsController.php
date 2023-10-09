<?php

namespace App\Http\Controllers;

use App\Models\Purchase_Items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PurchaseItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search=DB::select("SELECT * FROM purchase__items WHERE imei NOT IN (SELECT imei FROM sales_items)");
        return response()->json([
            'message' => 'Fetch Data Successfully',
            'status' => 'success',
            'data' =>$search
        ]);
    }

    /** 
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $check=Purchase_Items::where([
            ['imei','=',$request->imei],

        ])->first();

        if(!$check)
        {
        $save=new Purchase_Items;
        $save->invoice_no=$request->invoice_no;
        
        $save->model_name=$request->model_name;

        $save->color=$request->color;

        $save->imei=$request->imei;

        $save->purchase_price=$request->purchase_price;

        $save->sale_price=$request->sale_price;
      

        $save->save();

        return response()->json([
            'message' => "Product Added",
            'status' => 'success',
            'data' => Purchase_Items::get()

        ]);
    } 
        else{
            return response()->json([
                'message' => 'IMEI No Already Exist Please Chenge The IMEI No',
                'status' => 'Failed',
                'data' => Purchase_Items::get()
            ]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Purchase_Items $purchase_Items)
    {
        return response()->json([
            'message' => 'Fetch Data Successfully',
            'status' => 'success',
            'data' =>$purchase_Items
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Purchase_Items $purchase_Items,$invoice_no)
    {
        $save=Purchase_Items::where("id",$purchase_Items->id)->where("invoice_no",$invoice_no)->first();

        $save->model_name = $request->input('model_name');
        $save->color = $request->input('color');
        $save->imei = $request->input('imei');
        $save->purchase_price = $request->input('purchase_price');
        $save->sale_price = $request->input('sale_price');
      

        $save->save();

        return response()->json([
            'message' => "Product Updated",
            'status' => 'success',
            'data' => Purchase_Items::get()

        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Purchase_Items $purchase_Items)
    {
        $purchase_Items->delete();
        return response()->json([
            'message' => 'Fetch Data Successfully',
            'status' => 'success',
            'data' =>Purchase_Items::get()
        ]);
    }

    public function getSalesPrice(Request $request)
    {
        $imei = $request->input('imei');
        
        $imei = Purchase_Items::where('imei', $imei)->first();
        
        if ($imei) {
            $salesPrice = $imei->sale_price;
            return response()->json(['message'=>'Fetch Successfull','sales_price' => $salesPrice]);
        } else {
            return response()->json(['message' => 'Product not found'], 404);
        }
    }
}
