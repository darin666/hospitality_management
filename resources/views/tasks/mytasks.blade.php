<div class="col-sm-4">
    <h3>My tasks</h3>

    @foreach($tasks as $newTask)
        @if(Auth::user()->id == $newTask->user_id)
            <div class="mt-4">
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
            </div>
        @endif
    @endforeach
</div>