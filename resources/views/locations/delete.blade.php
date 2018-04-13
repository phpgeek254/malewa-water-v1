
<div id="delete_location_{{ $location->id }}" class="modal">
    <div class="modal-content">
        <h4 class="center"> Delete Location</h4>
        <p class="center"> Are you sure you want to delete this Location?? </p>
    </div>
    <div class="modal-footer">
        {!! Form::open(['route'=>['locations.destroy', $location->id], 'method'=>'DELETE']) !!}
        {!! Form::submit('Delete', ['class'=>'btn left']) !!}
        {!! Form::close() !!}

        <a href="#" class="waves-effect waves-green btn modal-action modal-close">Cancel</a>
    </div>
</div>