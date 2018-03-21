@extends('layouts.app')

@section('content')
    <!-- GET RID OF ALL <br> !!! -->
    <div class="row">
            <div class="col-sm-4 mb-5">
                <h3>All Issues</h3>
                @foreach($tasks as $newTask)<br>
                <a class="btn btn-danger" href="{{ route('show task',['id'=>$newTask->id]) }}">{{$newTask->name}}

                    <br>

                    {{$newTask->description}}

                    <br>

                    @foreach($shownApartments as $shownApartment)
                        @if($newTask->apartment_id == $shownApartment->id)
                        {{ $shownApartment->name }}
                        @endif
                    @endforeach
                </a>

                <br>
                @endforeach

                <br>

                <a class="btn btn-primary" href="{{ action('TaskController@create') }}">Create a new task</a>

                <br>
            </div>
    <hr/>

    <div class="col-sm-8 mb-5">
        <h3>My tasks</h3>
            @foreach($tasks as $newTask)<br>
                @if(Auth::user()->id == $newTask->user_id)
                    <a class="btn btn-danger" href="{{ route('show task',['id'=>$newTask->id]) }}">{{$newTask->name}}
                    <br>
                    {{$newTask->description}}
                    <br>
                    @foreach($shownApartments as $shownApartment)
                        @if($newTask->apartment_id == $shownApartment->id)
                        {{ $shownApartment->name }}
                        @endif
                    @endforeach
                    </a>
                    <br>
                @endif
            @endforeach
        </div>
    </div>

@endsection

