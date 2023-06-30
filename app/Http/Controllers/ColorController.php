<?php

namespace App\Http\Controllers;

use App\Models\color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'message' => 'Fetch Successfull',
            'status' => 'success',
            'data' =>Color::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $check=Color::where([
            ['color_name','=',$request->color_name],
            ['brand_name','=',$request->brand_name],

        ])->first();
        $save=new Color();
        $save->brand_name=$request->brand_name;
        $save->color_name=$request->color_name;
        $save->save();

        return response()->json([
            'message' => 'Color Added Successfully',
            'status' => 'success',
            'data' => Color::get()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(color $color)
    {
        return response()->json([
            'message' => 'Search Successfully',
            'status' => 'success',
            'data' => $color
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, color $color)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(color $color)
    {
        $color->delete();

        return response()->json([
            'message' =>'Color Deleted Successfully',
            'status' => 'success',
            'data' => $color::get()
        ]);
    }
}
