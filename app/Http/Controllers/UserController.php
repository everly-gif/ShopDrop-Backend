<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return $users;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): array
    {
        $user = new User;
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'name' => 'required',
            "contact" => 'required'
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->contact = $request->contact;
        $user->save();
        return ["success"=>true,"message"=>"User Registered"];
    }

    public function login(Request $request): array
    {
        $credentials = $request->only(['email','password']);
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if(Auth::attempt($credentials)) {
           $token = $request->user()->createToken("login_token")->plainTextToken;
            // return ["token"=>$token];
            return ["success"=>true,"message"=>"Logged in", "token" => $token,  "user" => $request->user()];
        }
        else
        return ["success"=>false,"message"=>"Error"];
    }
    
   

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return User::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->contact = $request->contact;
        $user->save();
        return ["success"=>true,"message"=>"User updated"];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return ["success"=>true, "message" => "user deleted"];
    }
}
