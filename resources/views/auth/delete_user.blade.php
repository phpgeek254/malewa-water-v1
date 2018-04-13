<div id="delete_user_{{ $user->id }}" class="modal">
        <div class="modal-content center">
                <h4>Delete User</h4>
                <p>Are you sure you want to delete this user ?? </p>
        </div>
        <div class="modal-footer">

                {!! Form::open(['route'=>['users.destroy', $user->id], 'method'=>'DELETE']) !!}
                {!! Form::submit('Delete', ['class'=>'btn left']) !!}

                {!! Form::close() !!}
                <a href="#" class="waves-effect waves-green btn modal-action modal-close">Cancel</a>
        </div>
</div>