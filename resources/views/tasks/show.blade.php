@extends('layouts.app')

@section('content')
    <div class="container">
    <h3>{{$newTask->name}}</h3>
    <h3>{{$newTask->description}}</h3>
        <a href="{{ route('edit task',['id'=>$newTask->id]) }}">Edit</a>



    <button type="submit" class="btn btn-alert" name="Edit Task">

<a href="{{action('TaskController@edit', [$newTask->id])}}">
{{ __('Edit Task') }}
</button>



@endsection

