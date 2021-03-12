<?php

namespace App\Http\Controllers\restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class RestaurantsController extends Controller
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
        return view('restaurants.create');
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
            'name'             => 'required',
            'phone'            => 'required',
            'logo'             => 'required',
            'has_delivery'     => 'required',
            'working_hours'    => 'required',
            'epayment'         => 'required',
        ]);
        $restaurants= Restaurant::create([
       'name'          => $request->name,
       'phone'         => $request->phone,
       'logo'          => $request->logo,
       'has_delivery'  => "1",
       'working_hours' => $request->working_hours,
       'epayment'      => "1",
       'rating'        => "7-5",
       'user_id'       => Auth::user()->id,
        ]);
        return redirect()->route('restaurants.show',$restaurants->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)   
    {
        $restaurants=Restaurant::find($id);
        $categories = Category::all();
 
        return view("restaurants.show",["restaurants"=>$restaurants,"categories"=>$categories]);
       // return view('restaurants.show', ["restaurants" => $restaurants]);
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
        //
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
