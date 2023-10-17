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

        $sumOfColumn = DB::table('sales__details')
        ->join('sales_items', 'sales__details.invoice_no', '=', 'sales_items.invoice_no')
        ->where('sales__details.date', $date)
        ->sum('price');    

            $post=DB::select("
            select sales_items.* from sales__details inner join sales_items ON sales__details.invoice_no=sales_items.invoice_no where sales__details.date='".$date."';
    
            ");    
        
        return response()->json([
            "message" => "Data Fetched successfully",
            "status" => "Success",
            "salesCount" => $count,
            "salesTotal" => $sumOfColumn,
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
