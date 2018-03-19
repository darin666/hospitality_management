@extends('layouts.app')

@section('content')
    <h1>Guest forms</h1>
    <br/>
    
    <hr/>

    @foreach($forms as $form)
        <div>
            <a href="{{ action('FormController@show', [$form->id]) }}">
                <h4>{{ $form->lastname }}, {{ $form->nationality }}</h4>
                <h5>Arrived: {{ $form->checkInDate }}</h5>
            </a>
        </div>
        <br/>
    @endforeach

@endsection




