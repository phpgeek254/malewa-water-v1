<div class="input-field col s12">
    {!! Form::text('name', null) !!}
    {!! Form::label('name', 'Location Name') !!}
    @if($errors->first('name'))
        <span class="error"> {{$errors->first('name')}}</span>
    @endif
</div>