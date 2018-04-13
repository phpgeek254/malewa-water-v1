<div id="add_cheque" class="modal">
	<div class="modal-content center">
		<h4>Add Cheque</h4>
		{!! Form::open(['route'=>['cheques.store']]) !!}
		@include('cheques.form')
	</div>
	<div class="modal-footer">
		{!! Form::submit('Save Cheque', ['class'=>'btn left']) !!}
		{!! Form::close() !!}
		<a href="#" class="waves-effect waves-green btn modal-action modal-close">Cancel</a>
	</div>
</div>