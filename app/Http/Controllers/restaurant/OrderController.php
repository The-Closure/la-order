<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Restaurant $restaurant)
    {
        Gate::authorize('owns-restaurant', $restaurant);
        $restaurant_id = $restaurant->id;
        // if (Auth::user()->restaurant->id == $restaurant_id) {
            $orders = Order::whereHas('orderItems', function (Builder $query) use ($restaurant_id) {
                    $query->whereHas('meal', function (Builder $q) use ($restaurant_id) {
                        $q->where('restaurant_id', $restaurant_id);
                    });
            })->paginate(10);
    
            return view('owner.restaurantorder.index', ['orders' => $orders]);
        // }

        // return redirect()->back()->with('danger', 'you can not go there');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        $orderitems = $order->orderItems;
        foreach ($orderitems as $item) {
             if ($item->meal->restaurant_id == Auth::user()->restaurant->id)
                return view('owner.restaurantorder.show',['order' => $order , 'orderitems'=>$orderitems]);
        }
        return redirect()->back()->with('danger', 'you can not go there');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
            'status' => 'required|string'
        ]);
        $order=Order::find($id);
        $order->status=$request->status;
        $order->save();
        return view('owner.restaurantorder.show',['order' => $order]);
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
