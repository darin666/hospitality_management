@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="text-center text-primary">{{ $shownApartment->name }}</h1>
                <div class="card">
                    <img class="card-img-topp" src={{$shownApartment->img_link}} alt="Image{{ $shownApartment->name }}">
                    <div class="card-body">
                        <h4>Address: {{ $shownApartment->address }}</h4><br/>
                        <h4>Number of keys: {{$shownApartment->key_counts}}</h4><br/>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <h4 class="mt-4 mb-4 text-primary text-center">List of Reservations: </h4>
                    <ul>
                        @foreach($shownReservations as $shownReservation)
                            <a class="btn btn-success btn-sm mt-2" href="{{ route('show reservation',[$shownReservation->id]) }}">{{$shownReservation->guest_name}}</a>
                            <span>From {{$shownReservation->checkin_date}} to {{$shownReservation->checkout_date}}</span><br/>

                            {{--<li>{{$shownReservation -> guest_name}} from {{$shownReservation->checkin_date}} to {{$shownReservation->checkout_date}}</li>--}}
                        @endforeach
                    </ul>
                <div class="text-center p-4 m4">

                @can('edit')
                <a class="btn-primary btn btn-block" href="{{ action('ReservationController@create', [$shownApartment->id]) }}">Add a reservation</a>
                <br/>
                @endcan
                <br/>
                <a class="btn btn-primary btn-block" href="{{ action('FormController@create', [$shownApartment->id]) }}">New guest form</a>
                <br/>
                <br/>
                @can('edit')
                <a class="btn btn-primary btn-block" href="{{ action('TaskController@create', [$shownApartment->id]) }}">Add a new task</a>
                @endcan
                </div>
            </div>
        </div>



    </div>

@endsection