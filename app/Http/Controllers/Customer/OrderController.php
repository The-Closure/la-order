<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Meal;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Auth::user()->orders;
        return view('order.index', ['orders'=>$orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('order.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'items.*.meal_id' => 'required|exists:meals,id',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.price' => 'required',
        ]);

        $order = Auth::user()->orders()->create([
            'total'         => 0,
            'status'        => 'pending',
            'method'        => 'direct',
            'rating'        => -1,
            'feedback'      => 'No yet',
            'customer_id'   => Auth::user()->id,
            'note'          => 'Not yet',
            'delivery_id'   => 0
        ]);

        $orderItems = $request->items;
        $total=0;
        foreach($orderItems as $orderItem)
            {
                $meal = Meal::find($orderItem['meal_id']);
                $newOrderItem = $order->orderItems()->create([
                    'meal_id' => $orderItem['meal_id'],
                    'quantity'=> $orderItem['quantity'],
                    'price'=> $meal->price,
                    ]);

                $total += $newOrderItem->price * $newOrderItem->quantity;

            }
        $order->update([
            'total' => $total
        ]);
        return redirect()->route('orders.show', [ 'order' => $order ])->with('success', 'all is well');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('order.show',['order'=> $order]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
