<div id="edit_record_{{ $record->id }}" class="modal">
    <div class="modal-content">
        <h4 class="center"> Edit record</h4>
        {!! Form::model($record, ['route'=>['records.update', $record->id], 'method'=>'PATCH']) !!}
        @include('records.form')
    </div>
    <div class="modal-footer">
        {!! Form::submit('Update', ['class'=>'btn left']) !!}
        {!! Form::close() !!}
        <a href="#" class="waves-effect waves-green btn modal-action modal-close">Cancel</a>
    </div>
</div>