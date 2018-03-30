@extends('layouts.app')

@section('content')
    <!-- GET RID OF ALL <br> !!! -->
    <div class="row">
            <div class="col-sm-4 mb-5">
            <h3>My tasks</h3>
            @foreach($tasks as $newTask)<br>
                @if(Auth::user()->id == $newTask->user_id)
                    <div class="row">
                        <div class="col-2">
                            @if($newTask->status_id === 0)
                            <div class="statusbutton-lg cross"></div>
                            @endif
                            @if($newTask->status_id === 1)
                            <div class="statusbutton-lg check"></div>
                            @endif
                        </div>
                        <div class="col-10">
                            <a class="btn btn-outline-primary btn-block" href="{{ route('show task',['id'=>$newTask->id]) }}">{{$newTask->name}}
                            @foreach($shownApartments as $shownApartment)
                                @if($newTask->apartment_id == $shownApartment->id)
                                {{ $shownApartment->name }}
                                @endif
                            @endforeach
                            </a>
                        </div>
                    </div>
                @endif
            @endforeach
            </div>

        <div class="col-sm-8 mb-5">
            <div class="d-flex justify-content-between">
            <h3>All Issues</h3>
            <a class="btn btn-primary" href="{{ action('TaskController@create') }}">Create a new task</a>
            </div>

            @foreach($tasks as $newTask)<br>
            <div class="row">
                    <div class="col-2">
                        @if($newTask->status_id === 0)
                            <div class="statusbutton-lg cross"></div>
                        @endif
                        @if($newTask->status_id === 1)
                            <div class="statusbutton-lg check"></div>
                        @endif
                    </div>
                    <div class="col-10">
                        <a class="btn btn-outline-primary btn-block" href="{{ route('show task',['id'=>$newTask->id]) }}">{{$newTask->name}}
                            @foreach($shownApartments as $shownApartment)
                                @if($newTask->apartment_id == $shownApartment->id)
                                {{ $shownApartment->name }}
                                @endif
                            @endforeach
                        </a>
                    </div>
            </div>
            @endforeach
        </div>
    </div>

@endsection

