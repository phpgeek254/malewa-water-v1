<div class="col s12 m4">
<div class="card">
	<div class="card-image">
		<img src="{{ asset('images/logo.png') }}">
		
	</div>
	<div class="card-content center">
		<span class="card-title">{{ $location->name }}</span>
	</div>
	<div class="card-action center" >
		<a  href="{{ route('locations.show', ['id'=>$location->id]) }}" >
			<i class="fa fa-folder-open blue-text"></i>
		</a>
		<a  href="#edit_location_{{ $location->id }}" >
			<i class="fa fa-pencil-square-o blue-text"></i>
		</a>
		<a href="#delete_location_{{ $location->id }}"> 
			<i class="fa fa-trash-o red-text"></i>
		</a>
	</div>
</div>
</div>

@include('locations.delete')
@include('locations.edit')
