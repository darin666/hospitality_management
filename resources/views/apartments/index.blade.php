@extends('layouts.app')

@section('content')
    <h1>Apartments</h1><hr>

    <div class="row">

        @include('tasks.mytasks')

        <div class="col-sm-8">
            @foreach($shownApartments as $shownApartment)
                <div class="mb-3">
                    <a class="btn btn-success" href="{{ route('show apartment',['id'=>$shownApartment->id]) }}">
                    {{$shownApartment->name}}</a>
                </div>
            @endforeach

            <div>
                <a class="btn btn-primary" href="{{ action('ApartmentController@create') }}">Add a new apartment</a>
            </div>
        </div>
    </div>

@endsection