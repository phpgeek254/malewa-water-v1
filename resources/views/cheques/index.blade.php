@extends('master')
@section('content')
	<div class="row">
		<div class="col s12">

    		<a href="#add_cheque">
    			<button type="button" class="btn-floating btn-large waves-effect waves-light red"><i class="fa fa-plus"></i> Add New Cheque</button>
    		</a>
			<table class="striped">
			<caption><h5 class="center"> Cheques </h5></caption>
			<tr>
				<th> Cheque No</th>
				<th> Payed To </th>
				<th> Reason </th>
				<th> Amount </th>
				<th> Payed By </th>
				<th colspan="3">Options </th>
			</tr>
			@forelse ($cheques as $cheque)
			<tr>
				<td>{{ strtoupper($cheque->check_number) }}</td>
				<td>{{ strtoupper($cheque->payed_to) }}</td>
				<td>{{ substr($cheque->purpose, 0, 20) }} ...</td>
				<td>{{ $cheque->amount }}</td>
				<td>{{ $cheque->user_id == 0 ? 'NA' : $cheque->user->name }}</td>
				<td>
					<a href="#cheque_details_{{ $cheque->id }}"><i class="fa fa-folder-open blue-text"></i></a></td>
				<td><a href="#edit_cheque_{{ $cheque->id }}"><i class="fa fa-pencil blue-text"></i></a></td>
				<td><a href="#delete_cheque_{{ $cheque->id }}"><i class="fa fa-trash red-text"></i></a></td>
			</tr>
				
			@empty
				<tr>
					<td colspan="9"> There is no data </td>
				</tr>
			@endforelse
			</table>
		</div>
	</div>

	@foreach ($cheques as $Cheque)
		@include('cheques.edit')
		@include('cheques.delete')
		@include('cheques.show')
	@endforeach		
	@include('cheques.create')
@endsection