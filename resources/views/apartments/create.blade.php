@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add a new Apartment</div>

                    <div class="card-body">
                        <form method="POST" action="{{ action('ApartmentController@store') }}">
                            {!! csrf_field() !!}
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>

                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control" name="address">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="status_id" class="col-md-4 col-form-label text-md-right">Status ID</label>

                                <div class="col-md-6">
                                    <input id="status_id" type="number" class="form-control" name="status_id">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="key_counts" class="col-md-4 col-form-label text-md-right">Number of keys</label>

                                <div class="col-md-6">
                                    <input id="key_counts" type="number" class="form-control" name="key_counts">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="img_link" class="col-md-4 col-form-label text-md-right">Link to photo </label>

                                <div class="col-md-6">
                                    <input id="img_link" type="text" class="form-control" name="img_link">

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