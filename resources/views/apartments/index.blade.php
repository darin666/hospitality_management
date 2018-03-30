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
        @foreach($apartments as $apartment)
                <a class="btn btn-success" href="{{ route('show apartment',['id'=>$apartment->id]) }}">{{$apartment->name}}</a>
        @endforeach

    @can('edit')
    <a class="btn btn-primary" href="{{ action('ApartmentController@create') }}">Add a new apartment</a>
    @endcan
    </div>


@endsection