<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Meal;
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
        //
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
            'total' => 'required',
            'method'=> 'required',
            'customer_id'=> 'required',

        ]);

        $order=Auth::user()->order->create([
            'total'  => 0,
            'status' => 'pending',
            'method'=> 'direct',
            'rating'=> '',
            'feedback'=> '',
            'customer_id' => Auth::user()->id,
            'note'=> ''
        ]);

        $orderItems = $request->items;
        $total=0;
        foreach($orderItems as $object)
            {
                $meal = Meal::find($object['meal_id']);
                $newOrderItem = $order->orderItems()->create([
                    'meal_id' => $object['meal_id'],
                    'quantite'=> $object['quantite'],
                    'price'=> $meal->price,
                    ]);

                $total += $newOrderItem->price * $newOrderItem->quantity;

            }
        return view('Order.show', [ 'order' => $order ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('order.show',['order'=>$order]);
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
