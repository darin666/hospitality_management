@extends('layouts.app')

@section('content')
    <div class="container">
    <h3>All Issues</h3><br>
        @foreach($tasks as $newTask)<br>
        <a class="btn btn-danger" href="{{ route('show task',['id'=>$newTask->id]) }}">{{$newTask->name}}<br>{{$newTask->description}}<br>{{$newTask->apartment_id}}</a><br>
        @endforeach

    <br><a class="btn btn-primary" href="{{ action('TaskController@create') }}">Create a new task</a><br>
    </div>



@endsection
