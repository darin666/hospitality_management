@extends('layouts.app')

@section('content')
    <div class="container">
    Display all the flats we have.
        @foreach($apartments as $apartment)
            <div class="btn btn-success">

                <a href="{{ route('show apartment',['id'=>$apartment->id]) }}">{{$apartment->name}}</a>

            </div>
        @endforeach
    <a class="btn btn-primary" href="{{ action('ApartmentController@create') }}">Add a new apartment</a>

    </div>


@endsection
