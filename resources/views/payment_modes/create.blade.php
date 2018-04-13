<!-- Modal Trigger -->

<!-- Modal Structure -->
<div id="add_payment_mode" class="modal">
	<div class="modal-content">
		<h4>Add A New Payment Mode</h4>
		{!! Form::open(['route'=>['payment_modes.store']]) !!}
		@include('payment_modes.form')
	</div>
	<div class="modal-footer">
		{!! Form::submit('Add', ['class'=>'btn left']) !!}
		{!! Form::close() !!}
		<a href="#" class="waves-effect waves-green btn modal-action modal-close">Cancel</a>
	</div>
</div>