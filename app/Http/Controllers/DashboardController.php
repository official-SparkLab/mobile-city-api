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
        $yDate=date("Y-m-d", strtotime("yesterday"));
        $count = DB::table('sales__details')
            ->join('brand_details', 'sales__details.invoice_no', '=', 'brand_details.invoice_no')
            ->where('sales__details.date', $date)
            ->count();

        $todayBuyTotal = DB::table('sales__details')
        ->join('brand_details', 'sales__details.invoice_no', '=', 'brand_details.invoice_no')
        ->where('sales__details.date', $date)
        ->sum('price');

        $yesterdayBuyCount = DB::table('sales__details')
        ->join('brand_details', 'sales__details.invoice_no', '=', 'brand_details.invoice_no')
        ->where('sales__details.date', $yDate)
        ->count();
        
        
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
            "yesterdayBuyCount" => $yesterdayBuyCount,
            "yesterdaybuyBack" => $yesSell,
            "data" => $post
        ]);
    }

    public function getPurchasePayablePendingAmount($mobileNo) {
       

        $pendingAmount=DB::select("
        SELECT((SELECT SUM(balance_amount) FROM purchase__details WHERE mobile_no='".$mobileNo."') - (SELECT SUM(paid_amount) FROM purchase_payables WHERE mobile_no='".$mobileNo."')) as pendingAmount;
        ");
    
        return response()->json([
            "message" => "Purchase Payable Amount Searched",
            "status" => "Success",
            "purchasePayablePendingAmount" => $pendingAmount,
        ]);
    }
    
    

    public function SellDetails() {
        $date = date('Y-m-d');
       
        $todaysSell = DB::table('sales_items')
            ->join('sales__details', 'sales__details.invoice_no', '=', 'sales_items.invoice_no')
            ->where('sales__details.date', $date)
            ->sum('sales_items.price');
        
        $todaysPurchase = DB::table('purchase__items')
            ->join('sales_items', 'purchase__items.imei', '=', 'sales_items.imei')
            ->join('sales__details', 'sales_items.invoice_no', '=', 'sales__details.invoice_no')
            ->where('sales__details.date', $date)
            ->sum('purchase__items.purchase_price');

        $todaysProfit = DB::table('purchase__items')
            ->join('sales_items', 'purchase__items.imei', '=', 'sales_items.imei')
            ->join('sales__details', 'sales_items.invoice_no', '=', 'sales__details.invoice_no')
            ->where('sales__details.date', $date)
            ->sum(DB::raw('sales_items.price - purchase__items.purchase_price'));
        
        return response()->json([
            "message" => "Today's sales total fetched successfully",
            "status" => "Success",
            "todaysPurchase" => $todaysPurchase,
            "todaysSell" => $todaysSell,
            "todaysProfit"=>$todaysProfit
        ]);
        
    }

    public function Stock()
    {
        
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
