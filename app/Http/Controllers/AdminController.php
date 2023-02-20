<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        $credentials=$request->only(['username','password']);

         $data=$request->user();

        if(Auth::guard('admin')->attempt($credentials))
        {
            return ["message"=>"Admin Login Success", "role" => 'admin'];
        }

        return ["message"=>"Admin Login Failure"];

    }


    public function register(Request $request)
    {
            $admin=new Admin;

            $admin->username=$request->username;
            $admin->password=Hash::make($request->password);
            $admin->save();

            return ["success"=>true,"message"=>"Admin Registered"];


    }

    public function getProducts(){
        $products = Product::all();
        return $products;   
    }




}