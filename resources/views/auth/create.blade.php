<!-- Modal Structure -->
<div id="add_user" class="modal">
	<div class="modal-content">
		<h4 class="center"> Add New User </h4>
		{!! Form::open(['route'=>['users.store'], 'files'=>true ]) !!}
		@include('auth.form')
		
	</div>
	<div class="modal-footer">
		{!! Form::submit('Add', ['class'=>'btn left']) !!}
		{!! Form::close() !!}
		<a href="#" class="waves-effect waves-green btn modal-action modal-close">Cancel</a>
	</div>
</div>