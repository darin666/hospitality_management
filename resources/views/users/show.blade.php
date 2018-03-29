@extends('layouts.app')

@section ('content')
<users>
<h5> First Name: {{$user->name}}</h5>
<h5>Surname: {{$user->lastname}}</h5>
<h5>Email: {{$user->email}}</h5>
<h5>Tel: {{$user->tel}}</h5>
<h5>User role id: {{$user->role_id}}</h5>



</users>



@can('edit')

<button type="submit" class="btn btn-alert" name="Edit user role">

<a href="{{action('UserController@edit', [$user->id])}}">
{{ __('Edit user role') }}
</button>

@endcan

@can('edit-emp')

<button type="submit" class="btn btn-alert" name="Edit user role">

<a href="{{action('UserController@edit', [$user->id])}}">
{{ __('Edit your details') }}
</button>

@endcan


@endsection