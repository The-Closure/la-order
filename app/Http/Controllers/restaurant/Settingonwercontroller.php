<?php

namespace App\Http\Controllers\Restaurant;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
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

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $restaurnt = Restaurant::find($id);
       return view('restaurnt.edit',['post' =>$restaurnt]);
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
            'id'                  =>'required|string',
            'name'                =>'required|string',
            'phone'               =>'required|string',
            'logo'                =>'required|file|image',
            'has_delivery'        =>'required|string',
            'working_hours'       =>'required|string',
            'rating'              =>'required|string',

        ]);
        $restaurnt = Restaurant::find($id);
        //$restaurnt -> id = $request -> id;
        $restaurnt -> name = $request -> name;
        $restaurnt -> phone = $request -> phone;
        $restaurnt -> logo = $request -> logo;
        $restaurnt -> has_delivery = $request -> has_delivery;
        $restaurnt -> working_hours  = $request ->  working_hours;
        $restaurnt -> rating= $request -> rating;
        $restaurnt ->update();

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
