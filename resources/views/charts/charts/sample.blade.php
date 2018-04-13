@extends('chart_template')
@section('chart')
@php
	$year = Session::has('user_year') ? Session::get('user_year') : date('Y'); 
	 $user = App\User::findOrFail($user_id);
        $records = App\Record::where([
            ['user_id', '=', $user->id],
            ['year', '=', $year],
        ])->orderBy('month', 'ASC')->get();
        
        $labels = [];
        $data = [];
        $recordController = new App\Helpers\Helpers();
        foreach ($records as $record)
        {
            $pre = $recordController->getPreviousRecord($record);
            $labels[] = monthToText($record->month);
            $data[] = (int)$recordController->getDifference($record, $pre);
        }

        // dd($data);
@endphp
    {!!
        Charts::create('bar', 'Chartjs' )
            ->elementLabel('Water Usage')
            ->labels($labels)
            ->values($data)
            ->width(0)
            ->title('Water Usage')->render();
     !!}
@endsection