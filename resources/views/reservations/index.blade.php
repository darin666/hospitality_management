@extends('layouts.app')

@section('content')
    <div class="container">
        Display all the reservations we have.
        <ul>
        @foreach($reservations as $reservation)
            <a class="btn btn-success mt-2" href="{{ route('show reservation',['id'=>$reservation->id]) }}">{{$reservation->guest_name}}</a>
            <span>From {{$reservation->checkin_date}} to {{$reservation->checkout_date}}</span><br/>
        @endforeach
        </ul>
    </div>


@endsection
