@extends('layouts.app')

@section('content')
    <div class="container">
    <h3>Show all outstanding tasks to finish.</h3><br>
        @foreach($tasks as $task)
           <br> <div class="btn btn-danger">{{$task->description}}</div><br>
        @endforeach
    <br><a class="btn btn-primary" href="{{ action('TaskController@create') }}">Create a new task</a><br>
    </div>



@endsection
