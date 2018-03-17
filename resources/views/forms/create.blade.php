@extends('layouts.app')

@section('content')
    <h1>Create a new guest form</h1>

    <hr/>

    {!! Form::open(['url' => 'form']) !!}
        <div class="form-group">
            {!! Form::label('checkInDate', 'Check in date:') !!}
            <!-- ['class' => 'form-control'] = bootsrap class -->
            {!! Form::text('checkInDate', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('checkOutDate', 'Check out date:') !!}
            {!! Form::text('checkOutDate', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('lastname', 'Last name:') !!}
            {!! Form::text('lastname', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('firstname', 'First name:') !!}
            {!! Form::text('firstname', null, ['class' => 'form-control']) !!}
        </div>

         <div class="form-group">
            {!! Form::label('dob', 'Date of birth:') !!}
            {!! Form::text('dob', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('nationality', 'Nationality:') !!}
            {!! Form::text('nationality', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('passportNumber', 'Passport number:') !!}
            {!! Form::text('passportNumber', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('visaNumber', 'Visa number (optional) :') !!}
            {!! Form::text('visaNumber', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('address', 'Address:') !!}
            {!! Form::text('address', null, ['class' => 'form-control']) !!}
        </div>

        <!-- sumbit form -->
        <div class="form-group">
            {!! Form::submit('Add Form', ['class' => 'btn btn-primary form-control']) !!}
        </div>


    {!! Form::close() !!}



@endsection