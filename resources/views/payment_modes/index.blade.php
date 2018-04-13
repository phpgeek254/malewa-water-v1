@extends('master')

@section('content')
	<div class="row">
		<div class="col m12 s12">
			@forelse ($payment_modes->chunk(3) as $chunk)
				<div class="row">
					@foreach ($chunk as $payment_mode)
							@include('payment_modes.payment_mode_list')
					@endforeach
				</div>
			@empty
				<h5 class="center"> There are no payment_mode posted yet.</h5>
			@endforelse
		</div>

		<div class="col m12 s12 center">
			@include('payment_modes.create')
			<a href="#add_payment_mode" class="btn"> <i class="fa fa-plus white-text"></i> Add New Payment Mode </a>
		</div>
	</div>
@endsection