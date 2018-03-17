@extends('layouts.app')

@section('content')
    <div class="container">
    Display all the flats we have.
        @foreach($apartments as $apartment)
            <div class="btn btn-primary">{{$apartment->name}}</div>
        @endforeach
    <a class="btn btn-primary" href="{{ action('ApartmentController@create') }}">Add a new apartment</a>
    </div>



@endsection
