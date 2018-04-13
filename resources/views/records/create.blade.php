@extends('master')
@section('content')
	<div class="row">
		<div class="col s12 center">
			<h4 class="center"> Add Records For {{ App\Location::find(Session::get('location'))->name }} 
			{{ monthToText(Session::get('month')) }} {{ Session::get('year') }}
			</h4>
			@if (count($users) > 0)
				{!! Form::open(['route'=>['records.store']]) !!}
			@forelse (array_chunk($users, 2) as $chunk)
			<div class="row">
				@foreach ($chunk as $user)
				{!! Form::hidden('user_id', $user->id) !!}
				<div class="input-field col m6 s12">
					{!! Form::number('reading', null, ['required']) !!}
					{!! Form::label('reading', $user->name) !!}
				</div>
				@endforeach
			</div>
			
			@empty
				<h5 class="center"> There are records to be added </h5>
			@endforelse
			{!! Form::submit('Save Records', ['class'=>'btn']) !!}
			{!! Form::close(); !!}	
			@endif
			
		</div>
	</div>
@endsection
