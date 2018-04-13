<div class="input-field col s12">
    {!! Form::text('name', null) !!}
    {!! Form::label('name', 'Name') !!}
    @if($errors->first('name'))
        <span class="error"> {{$errors->first('name')}}</span>
    @endif
</div>

<div class="input-field col s12">
    {!! Form::textarea('description', null, ['class'=>'materialize-textarea']) !!}
    {!! Form::label('description', 'Description') !!}
    @if($errors->first('description'))
        <span class="error"> {{$errors->first('description')}}</span>
    @endif
</div>