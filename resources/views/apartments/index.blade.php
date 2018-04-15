@extends('layouts.app')

@section('content')

    <div class="container">
    <h1 class="text-center text-primary">
        Apartment Managements
    </h1>


    <div class="card-deck">
        <div class="card">

        </div>

    </div>
        @foreach($shownApartments as $shownApartment)
                <a class="btn btn-success" href="{{ route('show apartment',['id'=>$shownApartment->id]) }}">{{$shownApartment->name}}</a>
        @endforeach

    @can('edit')
    <a class="btn btn-primary" href="{{ action('ApartmentController@create') }}">Add a new apartment</a>
    @endcan

    <div class="row">

        @include('tasks.mytasks')

        <div class="col-sm-8">
            <h1>Apartments</h1>
            <div>
                <a class="btn btn-primary mt-3 mb-3" href="{{ action('ApartmentController@create') }}">
                Add a new apartment</a>
            </div>
            <div class="card-deck">
                @foreach($shownApartments as $shownApartment)
                <div class="card bg-info text-center text-white mb-3">
                    <a href="{{ route('show apartment',['id'=>$shownApartment->id]) }}">
                        <img class="card-img-top" src="{{$shownApartment->img_link}}" alt="Card image cap" onerror="this.src = 'http://satyr.io/200x100/red';">
                    </a>
                    <div class="card-body">
                        <p class="card-text">{{$shownApartment->name}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>

@endsection
