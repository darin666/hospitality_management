@extends('layouts.app') @section ('content')




<h2>Users</h2>
<div class="row">

    <div class="col-sm-4 mb-5">

        @foreach ($users as $user)

        <users>
            <h5>
                @can('edit')
                <a href="{{action('UserController@show', [$user->id])}}"> {{$user->name}} {{$user->lastname}}</a>
                @endcan

            </h5>


            <h5>Name: {{$user->name}} {{$user->lastname}}</h5>
            <h5>Email: {{$user->email}}</h5>
            <h5>Tel: {{$user->tel}}</h5>
            <h5>User role id: {{$user->role_id}}</h5>



        </users>
        <br> @endforeach
    </div>

    <hr>
    <div class="col-sm-4 mb-5">

        <h3>My details</h3>

        @foreach ($users as $user) @if(Auth::user()->id == $user->id) @can('edit-emp')

        <a href="{{action('UserController@show', [$user->id])}}"> {{ $user->name }}</a>
        <h5>Email: {{$user->email}}</h5>
        <h5>Tel: {{$user->tel}}</h5>
        @endcan @can('edit')

        <a href="{{action('UserController@show', [$user->id])}}"> {{ $user->name }}</a>
        <h5>Email: {{$user->email}}</h5>
        <h5>Tel: {{$user->tel}}</h5>
        @endcan @endif @endforeach
    </div>
</div>





@endsection