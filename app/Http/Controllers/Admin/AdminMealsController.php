<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Meal;

class AdminMealsController extends Controller
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
            'name'             => 'required|string|min:4|max:255',
            'desc'           => 'required|min:11',
            'featured'    => 'required|active_url',
            'status' => 'required',
            'price' => 'required|numeric',
            'restaurant_id' => 'required',
            'category_id'=> 'required'
        ]);
        $meal=Meal::create($request->only(['name','desc','status','featured','price','restaurant_id','category_id']));
        return view("Admin.meals.show",["meal"=>$meal]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // when he open the category page and put show he has to send " return view("Admin.meals.show",$id);
        $meals=Meal::where('category_id',$id);
        return view("Admin.meals.show",["meals"=>$meals]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $meal=Meal::find($id);
        return view("Admin.meals.edit",["meal"=>$meal]);
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
            'desc'           => 'required|min:11',
            'featured'    => 'required|active_url',
            'status' => 'required',
            'working_hours' => 'required|numeric',
            'price' => 'required|numeric',
            'restaurant_id' => 'required',
            'category_id'=> 'required'
        ]);
        $meal=$request->update($request->only(['name','desc','status','featured','price','restaurant_id','category_id']));
        return view("Admin.meals.show",["meal"=>$meal]);
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
