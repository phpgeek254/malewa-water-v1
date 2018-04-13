<div class="input-field col m3 s12">
 {!! Form::select('location', App\Location::all()->pluck('name', 'id'), null, ['class'=>'select', 'required']) !!}
 {!! Form::label('location', 'Select Location') !!}
</div>
<div class="input-field col m3 s12">
 {!! Form::selectMonth('month', null, ['class'=>'select', 'required']) !!}
 {!! Form::label('month', 'Select Month') !!}
</div>
<div class="input-field col m3 s12">
 {!! Form::selectYear('year', date('Y'), (date('Y')-4), null, ['class'=>'select']) !!}
 {!! Form::label('year', 'Year') !!}
</div>