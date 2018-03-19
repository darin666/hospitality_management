@extends('layouts.app')

@section('content')
    <h1>Create a new guest form</h1>

    <hr/>

    {!! Form::open(['url' => 'form']) !!}

        @include('forms.form', ['submitButtonText' => 'Add Guest'])

    {!! Form::close() !!}

    @include('errors.list')

@endsection