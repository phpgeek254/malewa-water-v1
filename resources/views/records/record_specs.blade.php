<!-- Add Record Modal Structure -->
	<div id="add_records" class="modal">
		<div class="modal-content center">
			<h4>Select Specifics </h4>
			{!! Form::open(['route'=>'specs']) !!}
					@include('records.specs_form')
				</div>
		<div class="modal-footer">
			{!! Form::submit('Proceed', ['class'=>'btn left']) !!}
			{!! Form::close() !!}
			<a href="#" class="waves-effect waves-green btn modal-action modal-close">Cancel </a>
			
		</div>
	</div>