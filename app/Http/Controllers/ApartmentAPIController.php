<?php

namespace App\Http\Controllers;
use \App\Apartment;

use Illuminate\Http\Request;

class ApartmentAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Apartment::all();
    }

    public function show(Apartment $apartment)
    {
        return $apartment;
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'address' => 'required',
            'status_id' => 'integer',
            'key_counts' => 'integer',
        ]);
        $apartment = Apartment::create($request->all());

        return response()->json($apartment, 201);
    }

    public function update(Request $request, Apartment $apartment)
    {
        $apartment->update($request->all());

        return response()->json($apartment, 200);
    }

    public function delete(Apartment $apartment)
    {
        $apartment->delete();

        return response()->json(null, 204);
    }


}
