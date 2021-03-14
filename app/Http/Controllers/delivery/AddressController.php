<?php

namespace App\Http\Controllers\restaurant;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Area;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addresses= Auth::user()->addresses;
        return view('restaurants.addresses.index', ['addresses' => $addresses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::all()->pluck('id', 'name');

        return view('restaurants.addresses.create', ['areas' => $areas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // TODO: Get this done please ;)
        $request->validate([]);

        Auth::user()->addresses()->create($request->only(['city', 'area_id', 'street', 'details']));
        $user_id=Auth::user()->id;
        $restaurants=Restaurant::where('user_id',$user_id)->first();
        $restaurants_id=$restaurants->id;
       return redirect()->route('restaurants.show', $restaurants_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $address=Auth::user()->address;
        return view('restaurants.addresses.show', ['address' => $address]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $address=Auth::user()->address;
        $address = Address::find($id);

        return view('restaurants.addresses.edit', ['address' => $address]);
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
        $address = Address::find($id);

        $address->city = $request->city;
        $address->street = $request->street;
        $address->details = $request->details;
        if($address->save()) {
            request()->session()->flash('success', 'address was updated successfully.');
        } else {
            request()->session()->flash('danger', 'Something went wrong.');
        }
        return redirect()->route('restaurants.addresses.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
