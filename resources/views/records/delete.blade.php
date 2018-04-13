
<div id="delete_record_{{ $record->id }}" class="modal">
    <div class="modal-content">
        <h4 class="center"> Delete record</h4>
        <p class="center"> Are you sure you want to delete this record?? </p>
    </div>
    <div class="modal-footer">
        {!! Form::open(['route'=>['records.destroy', $record->id], 'method'=>'DELETE']) !!}
        {!! Form::submit('Delete', ['class'=>'btn left']) !!}
        {!! Form::close() !!}

        <a href="#" class="waves-effect waves-green btn modal-action modal-close">Cancel</a>
    </div>
</div>