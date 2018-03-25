<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Reservation;
use \App\Apartment;
use \App\Task;
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
        $newReservation->description = $request->get('description');
        $newReservation->addedBy_id = Auth::id();
        $newReservation->save();

        $newTask = new Task();
        $newTask->user_id = \Auth::id(); //Only Manager can create new reservations
        $newTask->name = 'Check '. $request->get('guest_name'). ' in on ' . $request->get('checkin_date');
        $newTask->raisedBy_id = \Auth::id();
        $newTask->apartment_id = $request->get('apartment_id');
        $newTask->status_id = 0;
        $newTask->category_id = 0;
        $newTask->description = 'Generated automatically. Notes: ' . $request->get('description');
        $newTask->save();

        $newTask = new Task();
        $newTask->user_id = \Auth::id(); //Only Manager can create new reservations
        $newTask->name = 'Check '. $request->get('guest_name'). ' out on ' . $request->get('checkout_date');
        $newTask->raisedBy_id = \Auth::id();
        $newTask->apartment_id = $request->get('apartment_id');
        $newTask->status_id = 0;
        $newTask->category_id = 0;
        $newTask->description = 'Generated automatically. (Notes:) ' . $request->get('description');
        $newTask->save();

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
        $shownReservation = \App\Reservation::find($id);

        $shownApartment = \App\Apartment::find($shownReservation->apartment_id);
        return view('reservations.show', ['shownApartment' => $shownApartment, 'shownReservation' => $shownReservation]);
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
