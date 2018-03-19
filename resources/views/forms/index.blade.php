@extends('layouts.app')

@section('content')
    <h1>Guest forms</h1>
    <br/>
    
    <hr/>
    @foreach($shownApartments as $shownApartment)

        <h2>{{$shownApartment->name}}</h2>

        @foreach($forms as $form)
            @if($form->apartment_id == $shownApartment->id)
            <div>
                <a href="{{ action('FormController@show', [$form->id]) }}">
                    <h4>{{ $form->lastname }}, {{ $form->nationality }}</h4>
                    <h5>Arrived: {{ $form->checkInDate }}</h5>
                </a>
            </div>
            <br/>
            @endif
        @endforeach
    @endforeach

@endsection




