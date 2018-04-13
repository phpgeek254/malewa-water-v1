
<!-- Modal Structure -->
<div id="open_detail_{{ $record->id }}" class="modal">
	<div class="modal-content center">
		<h4> Record Details </h4>
		<table class="striped bordered centered">
	<tr>
		<th>Customer </th>
		<td>{{strtoupper($record->user->name)}}</td>

	</tr>
	<tr>
		<th> {{ Session::has('records_month') ? monthToText(Session::get('records_month')-1) : monthToText(date('m')-1) }}
		 </th>
			<td>{{ $record->previous_reading != null ? $record->previous_reading : 'NA' }}</td>
	</tr>
	<tr>
		<th>{{ Session::has('records_month') ? monthToText(Session::get('records_month')) : date('F') }}
		</th>
		<td>{{ $record->reading }}</td>
	</tr>
	<tr>
		<th> Reading </th>
		<td>{{ $record->difference }}</td>
	</tr>
	<tr>
		<th> Status </th>
		<td>
				@if ($record->status == 'unpaid')
				<a href="#add_payment_{{ $record->id }}" class='btn-flat blue-text'>
					Unpaid 
					<i class="fa fa-times red-text"></i>
				</a>
				@else
				<a  class='btn-flat blue-text'>
					Paid
					<i class="fa fa-check green-text"></i> 
				</a>
				@endif 
			</td>
		</tr>
</table>
	</div>
	<div class="modal-footer">
		<a href="#" class="waves-effect waves-green btn left"> <i class="fa fa-print white-text "></i> Print</a>
		<a href="#" class="waves-effect waves-green btn modal-action modal-close"><i class="fa fa-times white-text"></i> Close</a>
	</div>
</div>