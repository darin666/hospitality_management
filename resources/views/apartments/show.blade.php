@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $shownApartment->name }}</h1>

        <h4>Address: </h4>{{ $sh->address }}<br/>
        <h4>Number of keys: </h4>{{$shownapartment->key_counts}}<br/>

        <ul>
            @foreach($shownreservations as $shownreservation)
                <li>{{$shownreservation -> id}}</li>
            @endforeach
        </ul>

        <a href="{{ action('ReservationController@create', [$shownapartment->id]) }}">Add more reservations for this apartment</a>

    </div>

@endsection