<div class="form-group">
    {!! Form::label('title', 'Name:') !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'id' => $type . '_title']) !!}
</div>
{{ $type }}
<!-- DATE  -->
<div class="form-group">
    {!! Form::label('start_date', 'Check in date:') !!}
    <!-- ['class' => 'form-control'] = bootsrap class -->
    {!! Form::input('date', 'start_date', date('Y-m-d'), ['class' => 'form-control', 'id' => $type . '_start_date']) !!}
</div>
<!-- DATE  -->
<div class="form-group">
    {!! Form::label('end_date', 'Check out date:') !!}
    {!! Form::input('date', 'end_date', date('Y-m-d'), ['class' => 'form-control', 'id' => $type . '_end_date']) !!}
</div>

<label for="apartment_id">Apartment:</label><br>

<select name="apartment_id" id="{{ $type }}_apartment_id">
    @foreach($apartments as $apartment)
        <option value="{{$apartment->id}}">{{$apartment->name}}</option>
    @endforeach
</select>

<!-- sumbit form -->
<div class="form-group mt-3">
    {!! Form::submit('Go', ['class' => 'btn btn-primary form-control']) !!}
</div>



