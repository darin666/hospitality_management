@extends('layouts.app')

@section('content')
    <div class="container">
    Show all outstanding tasks to finish.
        @foreach($tasks as $task)
            <div class="btn btn-primary">{{$task->description}}</div>
        @endforeach
    <a class="btn btn-primary" href="{{ action('TaskController@create') }}">Create a new task</a>
    </div>



@endsection
