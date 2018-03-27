@extends('layouts.app')

@section ('content')
<users>
<h5> {{$user->name}}</h5>
<h5>{{$user->lastname}}</h5>
<h5>{{$user->email}}</h5>
<h5>{{$user->tel}}</h5>



</users>

<button type="submit" class="btn btn-alert" name="Edit user role">

<a href="{{action('UserController@edit', [$user->id])}}">
{{ __('Edit user role') }}
</button>

@endsection