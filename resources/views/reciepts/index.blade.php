@extends('master')
@section('content')
	<div class="row">
		{{-- The section form goes here. --}}
		<div class="col s12 animated slideInDown noPrint center">
			{!! Form::open(['route'=>['load']]) !!}
			@include('records.specs_form')
			<div class="input-field col m3 s12">
				<button class="btn" name='submit'>
					<i class="fa fa-search white-text"></i>
				</button>
			</div>
			{!! Form::close() !!}
		</div>
	</div>
	<div class="row">
		@forelse ($records as $record)
			{{ $record->user->name }}
		@empty
			{{-- empty expr --}}
		@endforelse
	</div>
@endsection