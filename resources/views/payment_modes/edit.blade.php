<div id="edit_payment_mode_{{ $payment_mode->id }}" class="modal">
    <div class="modal-content">
        <h4 class="center"> Edit Paymnet Mode</h4>
        {!! Form::model($payment_mode, ['route'=>['payment_modes.update', $payment_mode->id], 'method'=>'PATCH']) !!}
        @include('payment_modes.form')
    </div>
    <div class="modal-footer">
        {!! Form::submit('Update', ['class'=>'btn left']) !!}
        {!! Form::close() !!}

        <a href="#" class="waves-effect waves-green btn modal-action modal-close">Cancel</a>
    </div>
</div>