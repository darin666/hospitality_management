@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $apartment->name }}</h1>

        <h4>Address: </h4>{{ $apartment->address }}<br/>
        <h4>Number of keys: </h4>{{$apartment->key_counts}}<br/>

        <ul>
            @foreach($reservations as $reservation)
                <li>{{$reservation -> id}}</li>
            @endforeach
        </ul>


        <p>Here we will show the list of options that belong to this question</p>

        <a href="{{ action('ReservationController@create', [$apartment->id]) }}">Add more reservations for this apartment</a>

    </div>

@endsection