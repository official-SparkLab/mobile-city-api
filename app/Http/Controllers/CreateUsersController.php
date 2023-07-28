<?php

namespace App\Http\Controllers;

use App\Models\Create_Users;
use Illuminate\Http\Request;

class CreateUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([

            'message' => "User Created Successfully", 
            'status' => 'success',
            'data' => Create_Users::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $save=new Create_Users;
        $save->full_name=$request->full_name;
        $save->gender=$request->gender;
        $save->contact=$request->contact;
        $save->email=$request->email;
        $save->password=$request->password;
        $save->save();

        return response()->json([

            'message' => "User Created Successfully", 
            'status' => 'success',
            'data' => Create_Users::get()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Create_Users $create_Users)
    {
        return response()->json([

            'message' => "Data Fetched Successfully", 
            'status' => 'success',
            'data' => $create_Users
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        {
            $save=create_Users::where("id",$id)->first();
            $save->full_name = $request->input('full_name');

            $save->gender = $request->input('gender');

            $save->contact = $request->input('contact');

            $save->email = $request->input('email');

            $save->password = $request->input('password');

            $save->save();
    
            return response()->json([
                'message' => 'User Updated',
                'status' => 'success',
                'data' => create_Users::get()
    
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Create_Users $create_Users)
    {
        $create_Users->delete();
        return response()->json([

            'message' => "User Deleted Successfully", 
            'status' => 'success',
            'data' => Create_Users::get()
        ]);

    }
}
