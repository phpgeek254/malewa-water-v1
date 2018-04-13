
<div id="delete_payment_mode_{{ $payment_mode->id }}" class="modal">
    <div class="modal-content">
        <h4 class="center"> Delete Payment Mode</h4>
        <p class="center"> Are you sure you want to delete this Payment Mode?? </p>
    </div>
    <div class="modal-footer">
        {!! Form::open(['route'=>['payment_modes.destroy', $payment_mode->id], 'method'=>'DELETE']) !!}
        {!! Form::submit('Delete', ['class'=>'btn left']) !!}
        {!! Form::close() !!}

        <a href="#" class="waves-effect waves-green btn modal-action modal-close">Cancel</a>
    </div>
</div>