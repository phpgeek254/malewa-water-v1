<?php $locations = App\Location::get(['name','id']); ?>

<div class="input-field col s12">
	{!! Form::text('name', null) !!}
	{!! Form::label('name', 'Enter Full Name') !!}
	 @if($errors)
	        <span class="help-block">{{ $errors->first('name') }}</span>
	 @endif
</div>

<div class="input-field col s12">
	{!! Form::select('location_id', $locations->pluck('name', 'id'), null, ['class'=>'select',]) !!}
	{!! Form::label('location_id', 'Select Location') !!}
</div>

<div class="input-field col s12">
	{!! Form::number('phone_number', null) !!}
	{!! Form::label('phone_number', 'Enter Phone Number') !!}

	@if($errors)
	        <span class="help-block">{{ $errors->first('phone_number') }}</span>
	 @endif
</div>

<div class="input-field col s12">
	{!! Form::email('email', null) !!}
	{!! Form::label('email', 'Enter Email') !!}
	@if($errors)
	        <span class="help-block">{{ $errors->first('email') }}</span>
	 @endif
</div>

<div class="file-field input-field col s12">
	<div class="btn">
	    <span>File</span>
	    {!! Form::file('profile_image') !!}
	</div>
	<div class="file-path-wrapper">
	    <input class="file-path validate" type="text">
	    @if($errors)
	        <span class="help-block">{{ $errors->first('profile_image') }}</span>
	    @endif
	</div>
</div>