@extends('master')

@section('content')
	<div class="row">
		<div class="col m12 s12">
			@forelse ($locations->chunk(3) as $chunk)
				<div class="row">
					@foreach ($chunk as $location)
							@include('locations.location_list')
					@endforeach
				</div>
			@empty
				<h5 class="center"> There are no locations posted yet.</h5>
			@endforelse
		</div>

		<div class="col m12 s12 center">
			@include('locations.create')
			<a href="#add_location" class="btn"> <i class="fa fa-plus white-text"></i> Add New Location </a>
		</div>
	</div>
@endsection