@extends('layouts.app')

@section('content')
    <div class="container">
    <h3>{{$newTask->name}}</h3>
    <h3>{{$newTask->description}}</h3>

    <a href="{{action('TaskController@edit', [$newTask->id])}}">
        <button type="submit" class="btn btn-alert" name="Edit Task">{{ __('Edit Task') }}</button>
    </a>

    <form action="{{ action('TaskController@upload', [$newTask->id]) }}" method="post" enctype="multipart/form-data" class="mt-3 mb-5">
        <label>Select image to upload:</label>
        <input type="file" name="file" id="file" class="ml-3 mr-3">
        <input type="submit" value="Upload" name="submit">
        <input type="hidden" value="{{ csrf_token() }}" name="_token">
    </form>
    @if ($newTask->img_link)
        <img src="{{asset('storage/uploads/' . $newTask->img_link)}}" alt="task-img">
    @endif
    @include('errors.list')

@endsection

