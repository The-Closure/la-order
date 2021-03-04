<?php

namespace App\Http\Controllers\delivery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Delivery;

class deliverycontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'working-hours'   => 'required|string|min:2|max:255',
            'vehicle'         => 'required|string|min:15',
        ]);
        $userId = Auth::id();
        $delivery = Delivery::create($request->only(['working-hours', 'vehicle']));
        $delivery->user_id=$userId;
        return redirect()->route('delviery.show');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=Auth::user();
        $userId = Auth::id();
        $delivery=Delivery::where('user_id',$userId);
        return view('delivery.show', ['user' => $user, 'delivery' => $delivery]);
        
        
    }
    public function my_order_items($id){
        
        $userId = Auth::id();
        $delivery=Delivery::where('user_id',$userId);
        $user = Auth::user();
        // $orders = $user->deliveryOrders;
        // $delivery_id=$delivery->id;
        $orders = Order::where('delivery_id',$delivery_id)->whereIn('status', ["preaper"]);
        return view('order.show', ['orders' => $orders,]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('order.show', ['orders' => $orders,]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'working-hours'   => 'required|string|min:2|max:255',
            'vehicle'         => 'required|string|min:15',
        ]);
        $delivery = Delivery::update($request->only(['working-hours', 'vehicle']));
        if ($delivery)
            request()->session()->flash('success', 'Category was created successfully.');
        else
            request()->session()->flash('danger', 'Something went wrong.');
            return redirect()->route('delviery.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
