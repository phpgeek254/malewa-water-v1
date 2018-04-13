@extends('master')	

@section('content')
@include('records.single_record_form')
	<div class="row noPrint" style="padding: 10px;">
        <div class="row">
            <div class="col s8 animated slideInDown">
                {!! Form::open(['route'=>['yearly_user_records']]) !!}
                {!! Form::hidden('user_id', $user->id) !!}
                <div class="row">
                  <div class="input-field col s6">
                 {!! Form::selectYear('year', date('Y'), (date('Y')-4), null, ['class'=>'select']) !!}
                </div>
                <div class="input-field col s6">
                <button name="submit" class="btn"><i class="fa fa-search white-text"></i></button>
                </div>
                {!! Form::close() !!}
            </div>  
                </div>
                
            <div class="col s4 animated slideInDown">
 

<script>
    $(function() {
        // Your tab id must match with the click element: administration_toggle
        // Change it how you like :)
        $('#chart').click(function() {
            $('.preloader-wrapper').fadeIn();
            $('iframe').css('opacity', 0);
            setTimeout(function() {
                $('iframe').each(function() {
                    $(this).attr('src', $(this).attr('src'));
                });
                $('.preloader-wrapper').fadeOut();
                setTimeout(function() {
                    $('iframe').animate({
                        opacity: 1,
                    }, 500);
                }, 500);
            }, 500);
        });
    });
</script>





                <a href="#add_single" class="right">
                <button type="button" class="btn-floating btn-large waves-effect waves-light red"><i class="fa fa-plus white-text"></i> </button> </a>
        </div>
        </div>

        <div class="col m12 s12 animated slideInRight">

             <ul id="tabs-swipe-demo" class="tabs">
    <li class="tab col s3"><a href="#info">User Information</a></li>
    <li class="tab col s3"><a href="#chart">Chart</a></li>
    <li class="tab col s3"><a class="active" href="#details"> Details </a></li>
    <li class="tab col s3"><a class="active" href="#payments"> Payments </a></li>
  </ul>
  <div id="info" class="col s12">
    <div class="card">
    <div class="card-image noPrint">
        <img src="{{ asset($user->profile_image) }}">
    </div>
    <div class="card-content">
        <ul class="collection with-header">
            <li class="collection-item"> <h5>Name : {{ $user->name }}</h5></li>
            <li class="collection-item">Email : {{ $user->email }}</li>
            <li class="collection-item">Phone Number : {{ $user->phone_number }}</li>
            <li class="collection-item">Location : {{ $user->location->name }}</li>
            
        </ul>
    </div>
    </div>
  </div>
    {{-- Chart goes here --}}
  <div id="chart" class="col s12">
   @php $chart_height = 300; @endphp
    <iframe id="latest_users" src="{{ route('chart', ['name' => 'charts.sample', 'height' => $chart_height, 'user_id'=>$user->id]) }}" height="{{ $chart_height + 200 }}" width="100%" style="width:100%; border:none;">
    </iframe>
  </div>

  {{-- Detailed Table data --}}
  <div id="details" class="col s12">
 @include('records.detailed_user_table', $records)
  </div>

<div id="payments" class="col s12">
    <h5 class="center">Payment History </h5>
    <table class="center striped">
        <tr>
            <th>Year</th>
            <th>Month</th>
            <th>Amount</th>
            <th>Payed By</th>
            <th>Code</th>
            <th>Date</th>
        </tr>
        @forelse ($records  as $record)
        @foreach ($record->payments as $payment)
            <td>{{ $record->year }}</td>
            <td>{{  monthToText($record->month) }}</td>
            <td>{{ $payment->amount }}</td>
            <td>{{ $payment->paymentMode->name }}</td>
            <td>{{ $payment->transaction_id }}</td>
            <td>{{ date('Y - m - d ', strtotime($payment->created_at)) }}</td>
        @endforeach
    @empty
        
    @endforelse
    </table>
</div>
           
       
        </div>
    </div>

    <div class="row">
         {{-- Chart to show this years Water consumption --}}
    </div>
@foreach ($records as $record)
    @include('records.edit')
    @include('records.delete')
@endforeach
    
@endsection