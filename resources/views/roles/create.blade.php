@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">New Role for dev purpose</div>

                    <div class="card-body">
                        <form method="POST" action="{{ action('RoleController@store') }}">
                            {!! csrf_field() !!}
                            <div class="form-group row">
                                <label for="label" class="col-md-4 col-form-label text-md-right">
                                    Label
                                </label>

                                <div class="col-md-6">
                                    <input id="label" type="text" class="form-control" name="label" placeholder="Manager or Employee">
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

    @include('errors.list')
@endsection