<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Restaurant;

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
        return view('customers.addresses.index', ['addresses' => $addresses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::all()->pluck('id', 'name');

        return view('customers.addresses.create', ['areas' => $areas]);
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
        $restaurants = Restaurant::all();
        return view('restaurants.index', ['restaurants' => $restaurants]);
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
        return view('customers.addresses.show', ['address' => $address]);
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

        return view('customers.addresses.edit', ['address' => $address]);
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
        return redirect()->route('customers.addresses.index');

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
