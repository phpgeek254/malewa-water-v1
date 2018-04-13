<!-- Modal Trigger -->

<!-- Modal Structure -->
<div id="add_location" class="modal">
	<div class="modal-content">
		<h4>Add New Location</h4>
		{!! Form::open(['route'=>['locations.store']]) !!}
		@include('locations.form')
	</div>
	<div class="modal-footer">
		{!! Form::submit('Add', ['class'=>'btn left']) !!}
		{!! Form::close() !!}
		<a href="#" class="waves-effect waves-green btn modal-action modal-close">Cancel</a>
	</div>
</div>