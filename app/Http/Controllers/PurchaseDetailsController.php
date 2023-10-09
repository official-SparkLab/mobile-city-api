<?php

namespace App\Http\Controllers;

use App\Models\purchase_Details;
use Illuminate\Http\Request;
use App\Models\Purchase_Items;
class PurchaseDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'message' => 'Fetch Successfully',
            'status' => 'success',
            'data' =>Purchase_Details::get()
        ]);
    }

    public function upload(Request $request)
    {
        
        
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $save=new Purchase_Details;
        $save->invoice_no=$request->invoice_no;
        $save->date=$request->date;

        $save->supplier_name=$request->supplier_name;
        $save->mobile_no=$request->mobile_no;
        $save->address=$request->address;

        $save->sub_total=$request->sub_total;

        $save->balance_amount=$request->balance_amount;

        $save->payable_amount=$request->payable_amount;

        $save->payment_mode=$request->payment_mode;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            
            // Generate a unique filename using the current date and time
            $currentDateTime = now()->format('YmdHis');
            $fileName = $currentDateTime . '_' . $file->getClientOriginalName();
            
            // Move the file to the 'Images' folder with the new filename
            $file->move('Images', $fileName);
            $save->file=$fileName;
            
           
        } else {
            return response()->json(['message' => 'No file uploaded'], 400);
        }

        
        $save->save();

        return response()->json([
            'message' => 'Invoice Generated Successfully',
            'status' => 'success',
            'data' => Purchase_Details::get()

        ]);

        

    }

    /**
     * Display the specified resource.
     */
    public function show($invoice_no)
    {
        $search=purchase_Details::where("invoice_no",$invoice_no);
        return response()->json([
            'message' => 'Fetch Successfully',
            'status' => 'success',
            'data' =>$search->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $invoice_no)
    {
    
            $save = Purchase_Details::where("invoice_no",$invoice_no)->first();
            if($save)
            {
            $save->date = $request->input('date');    
            $save->supplier_name = $request->input('supplier_name');
            $save->mobile_no = $request->input('mobile_no'); 
            $save->address = $request->input('address');
            $save->sub_total = $request->input('sub_total');
            $save->balance_amount = $request->input('balance_amount');
            $save->payable_amount = $request->input('payable_amount');
            $save->payment_mode = $request->input('payment_mode');
    
            $save->save();

            return response()->json([
                'message' => 'Purchase Details Updated',
                'status' => 'success',
                'data' => Purchase_Details::get()
    
            ]);
        }
        else{
            return response()->json([
                'message' => 'Invoice not found',
                'status' => 'Failed',
                'data' => ""
    
            ]);
        }
    

    }

   
    public function destroy($invoice_no)
    {

        $delete=Purchase_Details::findorFail($invoice_no);
        $delete->status=0;
        $delete->save();

        return response()->json([
            "message"=>"Purchase Details deleted successfully",
            "status"=>"success",
            "data"=> purchase_Details::get()
        ]);


     
    }

    public function getInvoice($invoice_no) {
        $Invoice = purchase_Details::join('purchase__items', 'purchase__details.invoice_no', '=', 'purchase__items.invoice_no')
                        ->where('purchase__details.invoice_no', $invoice_no)                
                        ->select('purchase__details.*', 'purchase__items.*')
                        ->get();
        return response()->json([
            'message'=>"Invoice Generated successfully",
            'status'=>'success',
            'data'=>$Invoice
        ]);                
    }
}
