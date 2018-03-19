@extends('layouts.app')

@section('content')
    <h4>{{ $form->firstname }} {{ $form->lastname }}, {{ $form->nationality }}</h4>
    <h5>Arrived: {{ $form->checkInDate }}, Leaving: {{ $form->checkOutDate }}</h5>
    <h6>Apartment: {{ $shownApartment->name }}</h6>
    <br/>

    <div>Date of birth: {{ $form->dob }}</div>


    <div>Adress: {{ $form->address }}</div>


    <div>Passport no: {{ $form->passportNumber }} </div>

    <br/>

    <a href="{{ action('FormController@edit', [$form->id]) }}">
        <button type="button" class="btn btn-primary">EDIT GUEST DETAILS</button>
    </a>

@endsection