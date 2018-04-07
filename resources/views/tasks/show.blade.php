@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Task number {{$newTask->id}}
        </div>
        <div class="card-body">
            <h5 class="card-title text-primary">{{$newTask->name}}</h5>
            <p class="card-text">{{$newTask->description}}</p>
            <a href="{{action('TaskController@edit', [$newTask->id])}}">
                <button class="btn-primary btn" type="submit" class="btn btn-alert" name="Edit Task">{{ __('Edit Task') }}</button>
            </a>

            <div class="mt-5 mb-5">
            <h5 class="card-title text-primary">To add an image to this task:</h5>
            </div>

            <form action="{{ action('TaskController@upload', [$newTask->id]) }}" method="post" enctype="multipart/form-data" class="mt-3 mb-5">
                <label>Select image to upload:</label>
                <input class="btn btn-outline-primary"type="file" name="file" id="file" class="ml-3 mr-3">
                <input class="btn btn-primary" type="submit" value="Upload" name="submit">
                <input type="hidden" value="{{ csrf_token() }}" name="_token">
            </form>

        </div>
    </div>


@if ($newTask->img_link)
    <img src="{{asset('storage/uploads/' . $newTask->img_link)}}" alt="task-img">
@endif

@include('errors.list')

@endsection

