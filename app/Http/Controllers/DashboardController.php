<?php

namespace App\Http\Controllers;

use App\Models\dashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $date = date('Y-m-d');
        $count = DB::table('purchase__details')
            ->join('purchase__items', 'purchase__details.invoice_no', '=', 'purchase__items.invoice_no')
            ->where('purchase__details.date', $date)
            ->count();

        $sumOfColumn = DB::table('purchase__details')
            ->join('purchase__items', 'purchase__details.invoice_no', '=', 'purchase__items.invoice_no')
            ->where('purchase__details.date', $date)
            ->sum('purchase_price'); 

            $post=DB::select("
            select purchase__items.* from purchase__details inner join purchase__items ON purchase__details.invoice_no=purchase__items.invoice_no where purchase__details.date='".$date."';
    
            ");    
        
        return response()->json([
            "message" => "Data Fetched successfully",
            "status" => "Success",
            "purchaseCount" => $count,
            "purchaseTotal" => $sumOfColumn,
            "data" => $post
        ]);
        
    }


    public function salesDetailsCount()
    {
        $date = date('Y-m-d');
        $count = DB::table('sales__details')
            ->join('sales_items', 'sales__details.invoice_no', '=', 'sales_items.invoice_no')
            ->where('sales__details.date', $date)
            ->count();

        $todaySellTotal = DB::table('sales__details')
        ->join('sales_items', 'sales__details.invoice_no', '=', 'sales_items.invoice_no')
        ->where('sales__details.date', $date)
        ->sum('price');
        
        $yDate=date("Y-m-d", strtotime("yesterday"));
         $yesSell = DB::table('sales__details')
         ->join('sales_items', 'sales__details.invoice_no', '=', 'sales_items.invoice_no')
         ->where('sales__details.date', $yDate)
         ->count();

            $post=DB::select("
            SELECT sales_items.*, brand_details.model_name as buy_model,brand_details.color as buy_color,brand_details.imei as buy_imei,brand_details.price as buy_price FROM sales__details left JOIN sales_items ON sales__details.invoice_no = sales_items.invoice_no LEFT JOIN brand_details ON sales__details.invoice_no = brand_details.invoice_no WHERE sales__details.date='".$date."';
    
            ");    
        
        return response()->json([
            "message" => "Data Fetched successfully",
            "status" => "Success",
            "todaySelleCount" => $count,
            "todaySellTotal" => $todaySellTotal,
            "yesterdaySell" => $yesSell,
            "data" => $post
        ]);
        
    }

    public function buyBack()
    {
           
        $date = date('Y-m-d');
        $count = DB::table('sales__details')
            ->join('brand_details', 'sales__details.invoice_no', '=', 'brand_details.invoice_no')
            ->where('sales__details.date', $date)
            ->count();

        $todayBuyTotal = DB::table('sales__details')
        ->join('brand_details', 'sales__details.invoice_no', '=', 'brand_details.invoice_no')
        ->where('sales__details.date', $date)
        ->sum('price');
        
        $yDate=date("Y-m-d", strtotime("yesterday"));
         $yesSell = DB::table('sales__details')
         ->join('brand_details', 'sales__details.invoice_no', '=', 'brand_details.invoice_no')
         ->where('sales__details.date', $yDate)
         ->sum('price');

            $post=DB::select("
            select brand_details.* from sales__details inner join brand_details ON sales__details.invoice_no=brand_details.invoice_no where sales__details.date='".$date."';
    
            ");    
        
        return response()->json([
            "message" => "Data Fetched successfully",
            "status" => "Success",
            "todayBuyBackCount" => $count,
            "todayBuyBackTotal" => $todayBuyTotal,
            "yesterdaybuyBack" => $yesSell,
            "data" => $post
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(dashboard $dashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(dashboard $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, dashboard $dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(dashboard $dashboard)
    {
        //
    }
}
