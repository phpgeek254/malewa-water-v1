
<!-- Modal Structure -->
<div id="delete_cheque_{{ $cheque->id }}" class="modal">
	<div class="modal-content center">
		<h4> Delete Cheque </h4>
		<p>Are you sure you want to delete this records ?? </p>
	</div>
	<div class="modal-footer">

		{!! Form::open(['route'=>['cheques.destroy', $cheque->id], 'method'=>'DELETE']) !!}

		{!! Form::submit('Delete', ['class'=>'btn left']) !!}
		{!! Form::close() !!}
		<a href="#" class="waves-effect waves-green btn modal-action modal-close">Cancel</a>
	</div>
</div>