@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $shownApartment->name }}</h1>

        <h4>Address: {{ $shownApartment->address }}</h4><br/>
        <h4>Number of keys: {{$shownApartment->key_counts}}</h4><br/>
        <h4>List of Reservations: </h4>

        <ul>
            @foreach($shownReservations as $shownReservation)
                <a class="btn btn-success mt-2" href="{{ route('show reservation',[$shownReservation->id]) }}">{{$shownReservation->guest_name}}</a>
                <span>From {{$shownReservation->checkin_date}} to {{$shownReservation->checkout_date}}</span><br/>

                {{--<li>{{$shownReservation -> guest_name}} from {{$shownReservation->checkin_date}} to {{$shownReservation->checkout_date}}</li>--}}
            @endforeach
        </ul>
        @can('edit')
        <a class="btn-primary btn" href="{{ action('ReservationController@create', [$shownApartment->id]) }}">Add a reservation</a>
        <br/>
        @endcan
        <br/>
        <a class="btn btn-primary" href="{{ action('FormController@create', [$shownApartment->id]) }}">New guest form</a>
        <br/>
        <br/>
        @can('edit')
        <a class="btn btn-primary" href="{{ action('TaskController@create', [$shownApartment->id]) }}">Add a new task</a>
        @endcan
    </div>

@endsection