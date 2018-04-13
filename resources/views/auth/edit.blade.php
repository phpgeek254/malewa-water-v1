
<div id="edit_user_{{ $user->id }}" class="modal">
	<div class="modal-content center">
		<h4>Edit User </h4>
		 {!! Form::model($user, ['route'=>['users.update','id'=>$user->id], 'method'=>'patch', 'files'=>true, ]) !!}

		 
        @include('auth.form')

	</div>
	<div class="modal-footer">
		{!! Form::submit('Save', ['class'=>'btn left']) !!}
{!! Form::close() !!}
		<a href="#" class="waves-effect waves-green btn modal-action modal-close">Cancel</a>
	</div>
</div>