<?php

namespace App\Http\Controllers;

use App\Apartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

//        return Apartment::all();
//        $apartments = \App\Apartment::all();
//        return view('apartments.index',['apartments' => $apartments ]);

        $tasks = \App\Task::all();
        $shownApartments = \App\Apartment::all();
        return view('apartments.index',['shownApartments' => $shownApartments, 'tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $apartments = \App\Apartment::all();
        return view('apartments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newApartment = new Apartment();
        $newApartment->name = $request->get('name');
        $newApartment->address = $request->get('address');
        $newApartment->status_id = $request->get('status_id');
        $newApartment->key_counts = $request->get('key_counts');
        $newApartment->img_link = $request->get('img_link');
        $newApartment->save();

        return redirect(action('ApartmentController@index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shownApartment = \App\Apartment::find($id);

        $shownReservations = $shownApartment->reservations()->get();
        return view('apartments.show', ['shownApartment' => $shownApartment, 'shownReservations' => $shownReservations]);
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
