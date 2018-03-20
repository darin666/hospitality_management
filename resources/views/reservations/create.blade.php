@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add a new Reservation for flat {{$apartment->name}}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ action('ReservationController@store') }}">
                            {!! csrf_field() !!}
                            {!! Form::hidden('apartment_id', $apartment->id) !!}
                            {{--<div class="form-group row">--}}
                                {{--<label for="apartment_id" class="col-md-4 col-form-label text-md-right">Apartment</label>--}}
                                {{--<div class="col-md-6">--}}
                                    {{--<select name="apartment_id">--}}
                                        {{--@foreach($apartments as $apartment)--}}
                                            {{--<option value="{{$apartment->id}}">{{$apartment->name}}</option>--}}
                                        {{--@endforeach--}}
                                    {{--</select>--}}
                                {{--</div>--}}

                            {{--</div>--}}
                            <div class="form-group row">
                                <label for="checkin_date" class="col-md-4 col-form-label text-md-right">Check In date</label>

                                <div class="col-md-6">
                                    <input id="checkin_date" type="date" class="form-control" name="checkin_date">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="checkout_date" class="col-md-4 col-form-label text-md-right">Check Out date</label>

                                <div class="col-md-6">
                                    <input id="checkout_date" type="date" class="form-control" name="checkout_date">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="checkin_time" class="col-md-4 col-form-label text-md-right">Check in time</label>

                                <div class="col-md-6">
                                    <input id="checkin_time" type="time" class="form-control" name="checkin_time">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="checkout_time" class="col-md-4 col-form-label text-md-right">Check out time</label>

                                <div class="col-md-6">
                                    <input id="checkout_time" type="time" class="form-control" name="checkout_time">

                                </div>
                            </div>

                            <div>
                                <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection