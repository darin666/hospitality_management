@extends('layouts.app') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Task</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="apartment_id" class="col-md-4 col-form-label text-md-right">Apartment</label>

                            <div class="col-md-6">

                                <select class="form-control" name="apartment_id">
                                    <!-- this part should be taken from the database, apartments table  -->

                                    <option>Apartment 1</option>
                                    <option>Apartment 2</option>
                                    <option>Apartment 3</option>
                                    <option>Apartment 4</option>
                                    <option>Apartment 5</option>
                                </select>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Raised by</label>

                            <div class="col-md-6">
                                <input id="raisedBy_id" type="text" class="form-control" name="raisedBy_id">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                            <div class="col-md-6">
                                <textarea class="form-control" id="description" name="description" rows="5"></textarea>

                            </div>
                        </div>

                        <div class="form-group">
                        <!-- we have to figure out how this will work with uploading the images -->
                            <label for="img_link">Upload image</label>
                            <input type="file" class="form-control-file" id="img_link" aria-describedby="fileHelp" name="img_link">
                            <small id="fileHelp" class="form-text text-muted">Please upload image here
                               </small>
                        </div>

                </div>

                <div class="form-group row row-centered ">
                <!-- I would like to make the submit button smaller and centered bootstrap!  -->
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
                </div>








            </div>
        </div>
    </div>
</div>
</div>
@endsection