<?php

namespace App\Http\Controllers;

use App\Models\brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all=Brand::get();
        return response()->json([
            'message' => 'Fetch Successfull',
            'status' => 'success',
            'Data' => $all

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post=new Brand;
        $post->brand_name=$request->brand_name;
        $post->description=$request->description;
        $post->save();
        return response()->json([
            'message' => 'Brand Added Successfully',
            'status' => 'Success',
            'data' => Brand::get()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(brand $brand)
    {
        return response()->json(['brand'=>$brand]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, brand $brand)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(brand $brand)
    {
        $brand->delete();
        return response()->json([
            'message' => 'Brand Deleted',
            'status'=>'true',
            'data'=>Brand::get()

        ]); 
    }
}
