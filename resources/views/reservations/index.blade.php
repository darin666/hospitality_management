@extends('layouts.app')

@section('content')
    <div class="container">
        Display all the reservations we have.
        @foreach($reservations as $reservation)
            <div class="btn btn-primary">{{$reservation->id}}</div>
        @endforeach
        <a class="btn btn-primary" href="{{ action('ReservationController@create') }}">Add a new reservation</a>

    </div>


@endsection
