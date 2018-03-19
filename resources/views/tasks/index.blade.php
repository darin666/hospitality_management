@extends('layouts.app')

@section('content')
    <div class="container">
    <h3>Show all outstanding tasks to finish.</h3><br>
        @foreach($tasks as $newTask)
        <a class="btn btn-danger" href="{{ route('show task',['id'=>$newTask->id]) }}">{{$newTask->description}}</a><br>
        @endforeach

    <br><a class="btn btn-primary" href="{{ action('TaskController@create') }}">Create a new task</a><br>
    </div>



@endsection
