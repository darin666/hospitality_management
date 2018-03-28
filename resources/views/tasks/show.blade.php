@extends('layouts.app')

@section('content')
    <div class="container">
    <h3>{{$newTask->name}}</h3>
    <h3>{{$newTask->description}}</h3>
        <a href="{{ route('edit task',['id'=>$newTask->id]) }}">Edit</a>





@endsection

