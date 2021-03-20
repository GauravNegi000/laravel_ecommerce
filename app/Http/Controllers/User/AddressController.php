<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Country;
use App\Models\City;
use App\Models\Address;
use App\Http\Requests\AddressStoreRequest;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $addresses = $user->addresses;
        return view('user/profile/address/index', compact('addresses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('user/profile/address/create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddressStoreRequest $request)
    {
        $user = Auth::user();
        Address::create([
            'user_id' => $user->id,
            'city_id' => $request->get('city'),
            'name'    => $request->get('name'),
            'address'    => $request->get('address'),
            'postal_code'    => $request->get('postal_code'),
            'mobile'    => $request->get('mobile'),
            'landmark'    => $request->get('landmark'),
        ]);
        return redirect()->route('address.index')->with('message', 'Successfully added your new address');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        $this->authorize('view', $address);

        return view('user/profile/address/show', compact('address'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        $this->authorize('update', $address);

        $countries = Country::all();
        return view('user/profile/address/edit', compact('address', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AddressStoreRequest $request, Address $address)
    {
        $this->authorize('update', $address);
        
        $address->update([
            'city_id' => $request->get('city'),
            'name'    => $request->get('name'),
            'address'    => $request->get('address'),
            'postal_code'    => $request->get('postal_code'),
            'mobile'    => $request->get('mobile'),
            'landmark'    => $request->get('landmark'),
        ]);
        return redirect()->route('address.index')->with('message', 'Successfully Updated your Address');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        $this->authorize('delete', $address);

        $address->delete();
        return redirect()->route('address.index')->with('message', 'Successfully Deleted your Address');
    }

    // function to fetch city of a particular country
    public function getCities($country_id)
    {
        $cities = City::where('country_id', $country_id)->get();
        return response()->json($cities);
    }
}
