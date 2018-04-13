<table class="striped centered bordered">
	<tr>
		<th>Customer </th>
		<th> {{ Session::has('records_month') ? monthToText(Session::get('records_month')-1) : monthToText(date('m')-1) }} </th>
		<th>{{ Session::has('records_month') ? monthToText(Session::get('records_month')) : date('F') }}</th>
		<th> Reading </th>
		<th> Amount </th>
		<th class="center"> Status </th>
		<th colspan="4" class="center noPrint"> Options</th>
	</tr>
@forelse ($records as $record)
		<tr>
			<td class="left">{{ strtoupper($record->user->name) }}</td>
			<td>{{ $record->previous_reading }}</td>
			<td>{{ $record->reading }}</td>
			<td>{{ $record->difference = null ? $record->reading : $record->difference }}</td>
			<td>{{ $record->difference = null ? $record->reading * 50 : $record->difference * 50 }}</td>
			<td>
				@if ($record->status == 'unpaid')
				<a href="#add_payment_{{ $record->id }}" class='btn-flat blue-text'>
					<i class="fa fa-times red-text"></i>
				</a>
				@elseif((int)$record->status < 100)
				{{ $record->status }} % Paid
				@else
					<i class="fa fa-check green-text"></i> 
				@endif 
			</td>
			<td>
			<a href="#open_detail_{{ $record->id }}" class='noPrint btn-flat blue-text'>
				<i class="fa fa-print blue-text"></i>
			</a>
			</td>
			<td>
				<a href="{{ route('users.show', ['id'=>$record->user_id]) }}" class='btn-flat blue-text noPrint'>
					<i class="fa fa-folder-open blue-text"></i>
				</a>
				</td>
			<td>
				<a href="#edit_record_{{ $record->id }}" class='btn-flat blue-text noPrint'>
					<i class="fa fa-pencil blue-text"></i>
				</a>
			</td>
			<td><a href="#delete_record_{{ $record->id }}" class='btn-flat blue-text noPrint'>
					<i class="fa fa-trash red-text"></i>
				</a>
			</td>
		</tr>
	@empty
		<tr><td colspan="8" class="center"> There are no records for the parameters select</td></tr>
	@endforelse
</table>
@forelse ($records as $record)
	@include('records.delete')
	@include('records.edit')
	@include('records.payment_form')
	 @include('records.record_detail')
@empty
	
@endforelse


