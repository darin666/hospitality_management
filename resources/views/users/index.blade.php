@extends('layouts.app')

@section ('content')

<h2>Users</h2>

@foreach ($users as $user)

<users>
<h5>
@can('edit')
<a href="{{action('UserController@show', [$user->id])}}"> {{$user->name}} {{$user->lastname}}</a>
@endcan

</h5>

@can('edit-emp')
<a href="{{action('UserController@show', [$user->id])}}"> {{$user->name}} {{$user->lastname}}</a>
@endcan

</h5>



<h5>Email: {{$user->email}}</h5>
<h5>Tel: {{$user->tel}}</h5>
<h5>User role id: {{$user->role_id}}</h5>



</users><br>


@endforeach

@endsection