@extends('master')

@section('content')
@include('records.record_specs')
	<div class="row">
		<div class="col m6 s12 center noPrint animated slideInTop" style="padding: 5px;">
			{!! Form::open(['route'=>'load_records']) !!}
			<div class="row">
			@include('records.specs_form')	
			<div class="col m3 s12">
				<button name='submit' class="btn"><i class="fa fa-search white-text"></i></button>
			</div>
			</div>
			{!! Form::close() !!}
			
		</div>

		<div class="col m6 s12 center noPrint" style="padding: 5px;">
			<a href="#add_records" class="right"> 
			<button type="button" class="btn-floating btn-large waves-effect waves-light red"><i class="fa fa-plus white-text"></i>
			</button>
			</a>
		</div>
		<div class="col m12 s12">
				<div class="row">
					<h5 class="center">
						{{ Session::has('records_location') ? App\location::find(Session::get('records_location'))->name : 'All' }} Records 
						For {{ Session::has('records_month') ? monthToText(Session::get('records_month')) : date('F') }}
						{{ Session::has('records_year') ? Session::get('records_year') : date('Y') }}
					</h5>
					<div class="row">
      <ul class="tabs">
        <li class="tab col s3"><a href="#records"> Records </a></li>
        <li class="tab col s3"><a class="active" href="#summary"> Charts </a></li>
        <li class="tab col s3"><a href="#compare"> Comparisons </a></li>
        <li class="tab col s3"><a href="#income"> Income </a></li>
      </ul>
    </div>
    <div id="records" class="col s12">
    	@include('records.record_list')
    </div>
    <div id="summary" class="col s12">Charts</div>
    <div id="compare" class="col s12">Comparisons</div>
    <div id="income" class="col s12">Income</div>
					
				</div>
		</div>
	</div>
	
@endsection