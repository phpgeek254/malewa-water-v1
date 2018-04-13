<div class="input-field col s12">
    {!! Form::text('reading', null) !!}
    {!! Form::label('reading', 'Enter New Reading') !!}
    @if($errors->first('name'))
        <span class="error"> {{$errors->first('reading')}}</span>
    @endif
</div>