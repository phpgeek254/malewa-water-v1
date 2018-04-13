<!-- Single Record Modal Structure -->
<div id="add_single" class="modal">
	<div class="modal-content">
		<h4>Add Record For {{ $user->name }}</h4>
		{!! Form::open(['route'=>'records.store']) !!}
		{!! Form::hidden('user_id', $user->id) !!}
		{!! Form::hidden('location_id', $user->location_id) !!}

		<div class="input-field col s12">
		 {!! Form::selectMonth('month', null, ['class'=>'select', 'required']) !!}
		 {!! Form::label('month', 'Select Month') !!}
		</div>

		<div class="input-field col s12">
		 {!! Form::selectYear('year', date('Y'), (date('Y')-4), null, ['class'=>'select']) !!}
		 {!! Form::label('year', 'Year') !!}
		</div>
		
		@include('records.form')
	</div>
	<div class="modal-footer">
		{!! Form::submit('Save Record', ['class'=>'btn left']) !!}
        {!! Form::close() !!}
        <a href="#" class="waves-effect waves-green btn modal-action modal-close">Cancel</a>
	</div>
</div>