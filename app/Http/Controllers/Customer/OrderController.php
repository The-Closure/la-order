<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

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
        $order=Auth::user()->orders()->create(['total'  => $request->total,
        'status' => 'pending',
        'method'=> 'direct',
        'rating'=> '',
        'feedback'=> '',
        'customer_id' => $request->customer_id,
        'note'=> ''
        ]);
        $orderItems = $request->items;
        foreach($orderItems as $object)
            {
                $orderItems = $order->items()->create([
                    'meal_id' => $object['meal_id'],
                    'quantite'=> $object['quantite'],
                    'price'=> $object['price']
                    ]);
                // $object->validate([
                //     'meal_id' => 'required',
                //     'quantite' => 'required|min:1',
                //     'price'=> 'required',

                // ]);
            }
        return view('Order.show',['order'=>$order]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer\OrderController  $orderController
     * @return \Illuminate\Http\Response
     */
    public function show(OrderController $orderController)
    {
            return view('order.show',['order'=>$orderController]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer\OrderController  $orderController
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderController $orderController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer\OrderController  $orderController
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderController $orderController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer\OrderController  $orderController
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderController $orderController)
    {
        //
    }
}
