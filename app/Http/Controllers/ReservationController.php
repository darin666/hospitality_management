<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Reservation;
use \App\Apartment;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateReservationRequest;


class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = \App\Reservation::all();
        return view('reservations.index',['reservations' => $reservations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $apartment = \App\Apartment::find($id);
        return view('reservations.create', ['apartment' => $apartment]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateReservationRequest $request)
    {
        $newReservation = new Reservation();
        $newReservation->apartment_id = $request->get('apartment_id');
        $newReservation->checkin_date = $request->get('checkin_date');
        $newReservation->checkout_date = $request->get('checkout_date');
        $newReservation->checkin_time = $request->get('checkin_time');
        $newReservation->checkout_time = $request->get('checkout_time');
        $newReservation->guest_name = $request->get('guest_name');
        $newReservation->addedBy_id = Auth::id();
        $newReservation->save();

        return redirect(action('ReservationController@index'));
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
