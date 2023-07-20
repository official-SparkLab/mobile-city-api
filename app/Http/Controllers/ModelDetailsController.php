<?php

namespace App\Http\Controllers;

use App\Models\model_details;
use Illuminate\Http\Request;

class ModelDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'message' => 'Fetch Successfully',
            'status' => 'success',
            'data' => model_details::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $save=new model_details();
        $save->model_name=$request->model_name;
        $save->color_name=$request->color_name;

        $save->opening_stock=$request->opening_stock;

        $save->description=$request->description;

        $save->save();

        return response()->json([
            'message' => "Model Saved Successfully",
            'status' => 'success',
            'data' => model_details::get()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(model_details $model_details)
    {
        return response()->json([
            'message' => 'Fetch Successfully',
            'status' => 'success',
            'data' => $model_details
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, model_details $model_details)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(model_details $model_details)
    {

        $model_details->delete();
        return response()->json([
            'message' => 'Model deleted successfully',
            'status' => 'success',
            'data' => model_details::get()
        ]);

    }
}
