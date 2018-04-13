<!-- Modal Structure -->
<div id="edit_cheque_{{ $cheque->id }}" class="modal">
	<div class="modal-content center">
		<h4> Edit Check </h4>
		{!! Form::model($cheque, ['route'=>['cheques.update', $cheque->id], 'method'=>'PATCH']) !!}

		@include('cheques.form')
	</div>
	<div class="modal-footer">

		{!! Form::submit('Save Changes', ['class'=>'btn left']) !!}
		{!! Form::close() !!}
		<a href="#" class="waves-effect waves-green btn modal-action modal-close">Cancel</a>
	</div>
</div>