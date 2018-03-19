@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $shownApartment->name }}</h1>

        <h4>Address: </h4>{{ $shownApartment->address }}<br/>
        <h4>Number of keys: </h4>{{$shownApartment->key_counts}}<br/>

        <ul>
            @foreach($shownReservations as $shownReservation)
                <li>{{$shownReservation -> id}}</li>
            @endforeach
        </ul>

        <a class="btn-primary btn" href="{{ action('ReservationController@create', [$shownApartment->id]) }}">Add more reservations for this apartment</a>
        <br/>
        <br/>
        <a class="btn btn-primary" href="{{ action('FormController@create', [$shownApartment->id]) }}">Form for a new guest in this apartment</a>

    </div>

@endsection