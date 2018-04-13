<div class="input-field col s12">
	{!! Form::text('check_number', null) !!}
	{!! Form::label('check_number', 'Enter Cheque Number') !!}
	<span class="error">{{ $errors->first('check_number') }}</span>
</div>

<div class="input-field col s12">
	{!! Form::number('amount', null) !!}
	{!! Form::label('amount', 'Enter the Amount') !!}
	<span class="error">{{ $errors->first('amount') }}</span>
</div>

<div class="input-field col s12">
	{!! Form::text('payed_to', null) !!}
	{!! Form::label('payed_to', 'Payed To') !!}
	<span class="error">{{ $errors->first('payed_to') }}</span>
</div>

<div class="input-field col s12">
	{!! Form::textarea('purpose', null, ['class'=>'materialize-textarea']) !!}
	{!! Form::label('purpose', 'Describe the reason') !!}
	<span class="error">{{ $errors->first('purpose') }}</span>
</div>
