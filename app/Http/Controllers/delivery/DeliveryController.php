<?php

namespace App\Http\Controllers\delivery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class deliverycontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $delivery = Delivery::create($request->only(['working-hours', 'vehicle']));
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
        $order = Order::where('delivery_id',$delivery_id)-> ->whereIn('votes', ['', '',]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
