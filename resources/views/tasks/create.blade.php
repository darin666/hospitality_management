@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create a new Task</div>

                    <div class="card-body">
                        <form method="POST" action="{{ action('TaskController@store') }}">
                            {!! csrf_field() !!}
                            <div class="form-group row">
                            <label for="apartment_id" class="col-md-4 col-form-label text-md-right">Apartment</label>
                            <div class="col-md-6">
                                <select name="apartment_id">
                                    @foreach($apartments as $apartment)
                                        <option value="{{$apartment->id}}">{{$apartment->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                            <div class="form-group row">
                                <label for="status_id" class="col-md-4 col-form-label text-md-right">Status ID</label>

                                <div class="col-md-6">
                                    <input id="status_id" type="text" class="form-control" name="status_id" value="1">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="category_id" class="col-md-4 col-form-label text-md-right">Category ID</label>

                                <div class="col-md-6">
                                    <input id="category_id" type="number" class="form-control" name="category_id">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                                <div class="col-md-6">
                                    <textarea id="description" type="text" class="form-control" rows="5" name="description"></textarea>

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
