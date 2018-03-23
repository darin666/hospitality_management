@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Resevation number: {{ $shownReservation->id }}</h1><br/>
        <h4>Apartment: {{$shownApartment->name}}</h4> <br/>
        <h4>Address: {{ $shownApartment->address }}</h4><br/>
        <h4>Name of Guest: {{$shownReservation->guest_name}}</h4><br/>
        <h4>Check-in Date: {{$shownReservation->checkin_date}}</h4>
    </div>

    <a class="btn-success btn mt-2" href="{{ action('ReservationController@index') }}">Back to list of reservations</a>


@endsection