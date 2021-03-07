<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminRestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants=Restaurant::paginate(3);
        return view("Admin.Restaurants.index",["restaurants"=>$restaurants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Admin.Restaurants.create");
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
            'name'             => 'required|string|min:4|max:255',
            'phone'           => 'required|min:11|numeric',
            'logo'    => 'required|active_url',
            'has_delivery' => 'required',
            'working_hours' => 'required',
            'rating' => 'required',
            'epayment' => 'required|string'->default('direct')
        ]);
        $restaurant=Restaurant::create($request->only(['name', 'phone','logo','has_delivery','working_hours','rating','epayment']));
        // if ($category)
        // request()->session()->flash('success', 'Category was created successfully.');
        // else
        //     request()->session()->flash('danger', 'Something went wrong.');
        
        return redirect()->route('Admin.Restaurants.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $restaurant=Restaurants::find($id);
        return view("Admin.Restaurants.show",["restaurant"=>$restaurant]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $restaurant=Restaurants::find($id);
        return view("Admin.Restaurants.edit",["restaurant"=>$restaurant]);
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
            'name'             => 'required|string|min:4|max:255',
            'phone'           => 'required|min:11|numeric',
            'logo'    => 'required|active_url',
            'has_delivery' => 'required',
            'working_hours' => 'required',
            'rating' => 'required',
            'epayment' => 'required|string'->default('direct')
        ]);
        $restaurant=$restaurant->update($request->only(['name', 'phone','logo','has_delivery','working_hours','rating','epayment']));
        return redirect()->route("Admin.Restaurants.show",["restaurant"=>$restaurant]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        restaurant::destroy($id);
        return redirect()->route("Admin.Restaurants.index");
    }
}
