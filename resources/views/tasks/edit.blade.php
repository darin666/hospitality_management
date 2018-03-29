@extends('layouts.app')
@section ('content')
{!! Form::model($newTask, ['method' => 'PATCH', 'action' => ['TaskController@update', $newTask->id]]) !!}
{{ csrf_field() }}

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Task {{$newTask->id}}</div>

                <div class="form-group row">
                    <label for="status_id" class="col-md-4 col-form-label text-md-right">Status ID</label>

                    <div class="col-md-6">
                        <input id="status_id" type="text" class="form-control" name="status_id" value="{{$newTask->status_id}}" />

                    </div>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" value="{{$newTask->name}}" />

                    </div>
                </div>

                <div class="form-group row">
                    <label for="category_id" class="col-md-4 col-form-label text-md-right">Category ID</label>

                    <div class="col-md-6">
                        <input id="category_id" type="number" class="form-control" name="category_id" value="{{$newTask->category_id}}" />

                    </div>
                </div>

                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                    <div class="col-md-6">
                        <input id="description" type="text" class="form-control" rows="5" name="description" value="{{$newTask->description}}"/>

                    </div>
                </div>

                <div>
                <input type="submit" class="btn btn-lg btn-primary btn-block" value="{{ __('Update') }}">
                </div>

                </form>
            </div>

        </div>
    </div>
</div>
</div>

{!! Form::close() !!}
    @include('errors.list')
@endsection