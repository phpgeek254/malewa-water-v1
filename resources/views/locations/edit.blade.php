<div id="edit_location_{{ $location->id }}" class="modal">
    <div class="modal-content">
        <h4 class="center"> Edit Location</h4>
        {!! Form::model($location, ['route'=>['locations.update', $location->id], 'method'=>'PATCH']) !!}
        @include('locations.form')
    </div>
    <div class="modal-footer">
        {!! Form::submit('Update', ['class'=>'btn left']) !!}
        {!! Form::close() !!}

        <a href="#" class="waves-effect waves-green btn modal-action modal-close">Cancel</a>
    </div>
</div>