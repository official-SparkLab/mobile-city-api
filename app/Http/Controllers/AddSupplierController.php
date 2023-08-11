<?php

namespace App\Http\Controllers;

use App\Models\add_supplier;
use Illuminate\Http\Request;

class AddSupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'message' => 'Fetch Successfully',
            'status' => 'success',
            'data' =>add_supplier::get()
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $save=new add_supplier;
        $save->supplier_name = $request->supplier_name;
        $save->contact=$request->contact;
        $save->address=$request->address;

        $save->save();

        return response()->json([
            'message' =>'Supplier Added Successfully',
            'status' =>'Success',
            'data' =>add_supplier::get()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(add_supplier $add_supplier)
    {
        {
            return response()->json([
                'message' =>'Fetch Successfully',
                'status' => 'success',
                'data' => $add_supplier
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        {
            $save=add_supplier::where("id",$id)->first();
            $save->supplier_name = $request->input('supplier_name');

            $save->contact = $request->input('contact');

            $save->address = $request->input('address');

            
            $save->save();
    
            return response()->json([
                'message' => 'Supplier Updated Successfully',
                'status' => 'success',
                'data' => add_supplier::get()
    
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(add_supplier $add_supplier)
    {
        {
            $add_supplier->delete();
            return response()->json([
                'message' => 'Supplier Deleted',
                'status' => 'success',
                'data'=>add_supplier::get()
            ]);
        }
    }
}
