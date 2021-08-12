<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Area;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        $cities = City::all();
        $user = User::find(1);


        return view('create', [
            'cities' => $cities,
            'addresses' => Address::all()
        ]);
    }

    public function store(Request $request)
    {
        $address = Address::create($request->all());

        return redirect()->back();
    }

    public function show(Address $address)
    {
        //
    }

    public function edit(Address $address)
    {
        //
    }

    public function update(Request $request, Address $address)
    {
        //
    }


    public function destroy(int $id)
    {
        $address = Address::find($id);
        $address->delete();

        return redirect()->back();
    }

    public function areas(int $id)
    {
        return response()->json([
            'status' => true,
            'list' => Area::where('city_id', $id)->get()->pluck('id', 'name')
        ]);
    }
}
