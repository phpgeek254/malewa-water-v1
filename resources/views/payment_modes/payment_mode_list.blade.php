<div class="col s12 m4">
<div class="card">
	<div class="card-image">
		<img src="{{ asset('images/logo.png') }}">
		
	</div>
	<div class="card-content">
		<span class="card-title">{{ $payment_mode->name }}</span>
		<p class="center"> {{ $payment_mode->description }}</p>
	</div>
	<div class="card-action center">
		<a href="{{ route('payment_modes.show', ['id'=>$payment_mode->id]) }}">Open</a>
		<a href="#edit_payment_mode_{{ $payment_mode->id }}">Edit </a>
		<a href="#delete_payment_mode_{{ $payment_mode->id }}"> Delete</a>
	</div>
</div>
</div>

@include('payment_modes.delete')
@include('payment_modes.edit')
