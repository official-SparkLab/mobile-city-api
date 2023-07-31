<?php
 
namespace App\Http\Controllers;

use App\Models\cash_book;
use Illuminate\Http\Request;

class CashBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            "message"=>"Entry Added Successfully",
            "status"=>"Success",
            "data"=>cash_book::get()


        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $save=new cash_book;
        $save->entry_name=$request->entry_name;
        $save->date=$request->date;
        $save->creadit_amount=$request->creadit_amount;
        $save->debit_amount=$request->debit_amount;
        $save->payment_mode=$request->payment_mode;
        $save->note=$request->note;
        $save->save();

        return response()->json([
            "message" =>"Entry Added Successfully",
            "status" =>"Success",
            "data" => cash_book::get()


        ]);


    }

    /**
     * Display the specified resource.
     */
    public function show(cash_book $cash_book)
    {
        return response()->json([
            "message"=>"Entry Added Successfully",
            "status"=>"Success",
            "data"=>$cash_book


        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        {
            $save=cash_book::where("id",$id)->first();
            $save->entry_name = $request->input('entry_name');

            $save->date = $request->input('date');

            $save->creadit_amount = $request->input('creadit_amount');

            $save->debit_amount = $request->input('debit_amount');

            $save->payment_mode = $request->input('payment_mode');

            $save->note = $request->input('note');


            $save->save();
    
            return response()->json([
                'message' => 'Entry Updated Successfully',
                'status' => 'success',
                'data' => cash_book::get()
    
            ]);
        }
    }

    /**
     * Remove the specified resource from storage. 
     */
    public function destroy(cash_book $cash_book)
    {
        $cash_book->delete();
        return response()->json([
            "message"=>"Entry Delete Successfully",
            "status"=>"Success",
            "data"=>cash_book::get()
 

        ]);
    }
}
