@extends('layouts.app')

@section('content')
    <div class="container">
        Display all the reservations we have.
        @foreach($reservations as $reservation)
            <div class="btn btn-primary">{{$reservation->id}}</div>
        @endforeach

    </div>


@endsection
