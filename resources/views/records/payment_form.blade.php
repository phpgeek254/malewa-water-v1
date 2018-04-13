
<!-- Modal Structure -->
<div id="add_payment_{{ $record->id }}" class="modal">
	<div class="modal-content center">
		<h4> Add Payment </h4>
		{!! Form::open(['route'=>['payments.store']]) !!}
		{!! Form::hidden('record_id', $record->id) !!}
		{!! Form::hidden('user_id', $record->user_id) !!}
		<div class="input-field col s12">
		 {!! Form::select('payment_mode_id', App\PaymentMode::all()->pluck('name', 'id'), null, ['class'=>'select']) !!}
		 {!! Form::label('payment_mode_id', 'Select Payment Mode') !!}
		</div>

		<div class="input-field col s12">
		 {!! Form::text('transaction_id', null) !!}
		 {!! Form::label('transaction_id', 'Enter Transaction Id (M-Pesa Transaction Code, Airtel Money Id, Cheque Number ETC') !!}
		</div>
		
		<div class="input-field col s12">
		 {!! Form::number('amount', null) !!}
		 {!! Form::label('amount', 'Amount') !!}
		</div>

	</div>
	<div class="modal-footer">
		{!! Form::submit('Save Payment', ['class'=>'btn left']) !!}
		{!! Form::close() !!}
		<a href="#" class="waves-effect waves-green btn modal-action modal-close">Cancel </a>
	</div>
</div>