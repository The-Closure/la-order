<?php

namespace App\Http\Controllers\Delivery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Delivery;

class DeliveryController extends Controller
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
            'working_hours'   => 'required',
            'vehicle'         => 'required|string|min:2',
        ]);
        $userId = \Auth::id();
        $delivery = Delivery::create([
            'working_hours'   => $request->working_hours,
            'vehicle'         => $request->vehicle,
            'user_id'         => $userId,
            ]);
        return redirect()->route('delvieryshow', $delivery->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=\Auth::user();
        $userId = \Auth::id();
        $delivery=Delivery::where('user_id',$userId)->first();
        return view('delivery.show', ['user' => $user, 'delivery' => $delivery]);
        
        
    }
    public function my_order_items($id){
        
        $userId = \Auth::id();
        $delivery=Delivery::where('user_id',$userId);
        $user = \Auth::user();
        // $orders = $user->deliveryOrders;
        // $delivery_id=$delivery->id;
        $orders = Order::where('delivery_id',$delivery_id)->whereIn('status', ["preaper"]);
        return view('delivery.showorder', ['orders' => $orders,]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userId = \Auth::id();
        $delivery=Delivery::find($id)->first();
    
        return view('delivery.edit', $delivery->id);
        //return view('order.show', ['orders' => $orders,]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Delivery $delivery)
    {
        $request->validate([
            'working-hours'   => 'required',
            'vehicle'         => 'required',
        ]);
        $userId = \Auth::id();
        $delivery = Delivery::update($request->only(['working-hours', 'vehicle']));
        if ($delivery)
            request()->session()->flash('success', 'Category was created successfully.');
        else
            request()->session()->flash('danger', 'Something went wrong.');
            return redirect()->route('delivery.show',['delivery'=> $delivery]);
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
