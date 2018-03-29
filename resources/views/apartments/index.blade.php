@extends('layouts.app')

@section('content')
    <div class="container">
    Display all the flats we have.
        @foreach($apartments as $apartment)


                <a class="btn btn-success" href="{{ route('show apartment',['id'=>$apartment->id]) }}">{{$apartment->name}}</a>


        @endforeach

    @can('edit')
    <a class="btn btn-primary" href="{{ action('ApartmentController@create') }}">Add a new apartment</a>
    @endcan
    </div>


@endsection