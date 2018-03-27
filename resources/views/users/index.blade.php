@extends('layouts.app')

@section ('content')

<h2>Users</h2>

@foreach ($users as $user)

<users>
<h5>

<a href="{{action('UserController@show', [$user->id])}}"> {{$user->name}}</a>

</h5>
<h5>{{$user->lastname}}</h5>
<h5>{{$user->email}}</h5>
<h5>{{$user->tel}}</h5>
<h5>{{$user->role_id}}</h5>



</users><br>


@endforeach

@endsection