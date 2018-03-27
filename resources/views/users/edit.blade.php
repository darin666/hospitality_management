@extends('layouts.app')

@section ('content')

<h4>Edit {!! $user->name !!}'s role</h4>

{!! Form::model($user, ['method' => 'PATCH', 'action' => ['UserController@update', $user->id]]) !!}


    {{ csrf_field() }}
    {{ method_field('patch') }}

    <input type="text" name="role"  value="{{ $user->role_id }}" placeholder="insert role id" />
    <input type="tel" name="tel"  value="{{ $user->tel }}" />


    <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>


    {!! Form::close() !!}

@endsection
