<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Ladgers extends Controller
{
    public function index(Request $request)
    {
        $posts = DB::select("
        SELECT date, invoice_no, sub_total, payable_amount
        FROM purchase__details
        WHERE mobile_no = '".$request->mobile_no."' and date BETWEEN '".$request->date1."' and  '".$request->date2."'

        UNION ALL

        SELECT date, 'Payed Amount' AS invoice_no, 0 AS sub_total, paid_amount AS payable_amount
        FROM purchase_payables

        WHERE mobile_no = '".$request->mobile_no."' and date BETWEEN '".$request->date1."' and  '".$request->date2."'


        ORDER BY date;
        ");

        return response()->json([
        "message" => "Data Fetched successfully",
        "status" => "Success",
        "data" => $posts

        ]);
    }


    public function GeneralLedger(Request $request)
    {
                $post=DB::select("
                SELECT date, entry_name, creadit_amount, debit_amount
        FROM cash_books 
        where date between '".$request->date1."' and '".$request->date2."'

        UNION ALL

        SELECT date, concat('Purchase Invoice:',invoice_no), sub_total, payable_amount
        FROM purchase__details 
        where date between '".$request->date1."' and '".$request->date2."'

        UNION ALL

        SELECT date, 'Payed Amount' AS invoice_no, 0 AS sub_total, paid_amount AS payable_amount
        FROM purchase_payables
        where date between '".$request->date1."' and '".$request->date2."'

        UNION ALL

        SELECT date, concat('Sales Invoice:',invoice_no), '0', grand_total
        FROM sales__details
        where date between '".$request->date1."' and '".$request->date2."'

        ORDER BY date;
                ");

                return response()->json([
                    "message" => "Data Fetched successfully",
                    "status" => "Success",
                    "data" => $post
            
                    ]);
    }


    public function ledgerCashBook(Request $request)
    {
                $post=DB::select("
                SELECT date, entry_name, creadit_amount, debit_amount
        FROM cash_books 
        where date between '".$request->date1."' and '".$request->date2."'

        

        ORDER BY date;
                ");

                return response()->json([
                    "message" => "Data Fetched successfully",
                    "status" => "Success",
                    "data" => $post
            
                    ]);
    }

    public function getSupplier(){
        $post=DB::select("
        SELECT supplier_name, contact, address
        FROM add_suppliers      

        ");

        return response()->json([
            "message" => "Data Fetched successfully",
            "status" => "Success",
            "data" => $post
    
            ]);
    }

    public function purchaseReport($date1,$date2)
    {
        $post=DB::select("
        select * from purchase__items where invoice_no in (select invoice_no from purchase__details where date between '".$date1."' and '".$date2."');

        ");

        return response()->json([
            "message" => "Data Fetched successfully",
            "status" => "Success",
            "data" => $post
    
            ]);
    }


    public function salesReport($date1,$date2)
    {
        $post=DB::select("
        select * from sales_items where invoice_no in (select invoice_no from sales__details where date between '".$date1."' and '".$date2."');
        ");

        return response()->json([
            "message" => "Data Fetched successfully",
            "status" => "Success",
            "data" => $post
    
            ]);
    }



    




}
