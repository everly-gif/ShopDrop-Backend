<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $order = new OrderDetails;
        $order->order_id = $request->cart['order_id'];
        $order->product_id = $request->cart['pivot']['product_id'];
        $order->quantity = $request->cart['pivot']['quantity'];
        $order->save();

        return ["success" => true];

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    public function showUserOrders(string $user_id){
        // $order = Order::where(["user_id"=>$user_id])->orderDetails()->get();

        $orders=User::find($user_id)->orders()->with('orderDetails')->get();

        //$orders=OrderDetails::where('user_id',$user_id)->with('product')->with('order')->get();


        // $userProducts=User::find($user_id)->orderDetails()->get();
        return $orders;
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
    public function update(Request $request, string $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        //
    }
}
