
@extends('layouts.app')

@section ('content')



{!! Form::model($user, ['method' => 'PATCH', 'action' => ['UserController@update', $user->id]]) !!}


    {{ csrf_field() }}

    @can('edit')
    <h4>Edit {!! $user->name !!}'s role</h4>

  <input type="text" name="role_id"  value = "{{$user->role_id}}" placeholder="insert role id"/>



    <input type="submit" class="btn btn-primary" value="{{ __('Update') }}">
    @endcan

    @can('edit-emp')
    <h4>Edit {!! $user->name !!}'s details</h4>
    <input type="email" name="email"  value = "{{$user->email}}"/>
    <input type="tel" name="tel"  value ="{{ $user->tel }}" />
    <input type="text" name="lastname"  value = "{{$user->lastname}}"/>



    <input type="submit" class="btn btn-primary" value="{{ __('Update') }}">
    @endcan

    {!! Form::close() !!}

@endsection