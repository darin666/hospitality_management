@extends('layouts.app')

@section('content')
    <h1>Edit guest form</h1>

    <br/>

    <h4>{{ $form->firstname }} {{ $form->lastname }}, {{ $form->nationality }}</h4>
    <h5>Arrived: {{ $form->checkInDate }}, Leaving: {{ $form->checkOutDate }}</h5>
    <h6>Apartment: {{ $shownApartment->name }} </h6>

    <br/>

    {!! Form::model($form, ['method' => 'PATCH', 'action' => ['FormController@update', $form->id]]) !!}

        @include('forms.form', ['submitButtonText' => 'Edit Guest'])

    {!! Form::close() !!}

    @include('errors.list')

@endsection