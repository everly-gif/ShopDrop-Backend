<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        //
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

     public function showOrders(string $user_id){
        // $products= Order::with('orderDetails')->get();
        // $userProducts= Order::where(['user_id'=>$user_id])->get();
        // $orderDetails = new Collection;
        // foreach($userProducts as $order) {
        // $orderDetails->push(OrderDetails::where(['order_id'=>$order->id])->get());
        //}
        $orderDetails = User::where(['user_id'=>$user_id])->orders()->get();
       return $orderDetails;
     }
    public function store(Request $request)
    {
        $order = new Order;
        $order->user_id = $request->user_id;
        $order->amount = $request->total;
        $order->payment_status = $request->pay_id;
        $order->save();

        return ["success"=>true, "message" => "Order Placed", "order_id" => $order->id];
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        //
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
