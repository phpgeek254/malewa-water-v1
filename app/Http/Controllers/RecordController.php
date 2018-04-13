<?php

namespace App\Http\Controllers;

use App\Record;
use Illuminate\Http\Request;
use \Carbon\Carbon;
use App\User;
use Illuminate\Support\Facades\Session;

class RecordController extends Controller
{

    
    public function index()
    {
        $records = $this->getRecords();

        $this->assignPublicAttributes($records);

        return view('records.index', compact('records'));
    }

    public function getDifference($curr, $prev)
    {
        $diff = null;
     if(is_object($curr))
     {
         if(!is_object($prev))
         {
             $diff = (int)$curr->reading;
         } else {
             $d =  $curr->reading - $prev->reading;
             if($d < 1)
             {
                 $diff = 'Problem';
             } else {
                 $diff = (int)$d;
             }
         }

     }
     return $diff;
    }

    public function getPreviousRecord($record)
    {
        $prevRecord = null;

        $month = null; 
        $year = null;
        if(is_object($record))
        {
             if($record->month == 1)
        {
            $month = 12;
            $year = ($record->year - 1);
        } else 
        {
            $month = ($record->month - 1);
            $year = $record->year;
        }
       
        $p_record = Record::where([
            ['user_id', '=', $record->user_id],
            ['month', '=', $month],
            ['year', '=', $year],
        ])->get(['reading'])->first();

        if(count($p_record) > 0 )
        {
            $prevRecord = $p_record;
        } else {
            $prevRecord = NULL;
        }
    } else {
        return 'problem';
    }
       
        return $prevRecord;

    }

    public function create()
    {
        $users = [];
        $customers = User::where('location_id', '=', Session::get('location'))->get();
 
        foreach ($customers as $customer) {
            if(!$this->recordExists($customer->id, Session::get('month'), Session::get('year')))
                {
                   $users[] = $customer;
                }
        }
        return view('records.create', compact('users'));
    }

    public function recordExists($user_id, $month, $year)
    {
        if(Record::where([
            ['user_id', '=', $user_id],
            ['month', '=', $month],
            ['year', '=', $year]
        ])->count() > 0)
        {
            return true;
        } else {
            return false;
        }
    }

    public function store(Request $request)
    {
        if(Session::has('location') and Session::has('month') and Session::has('year'))
            {
                if($this->addAllRecords($request) != null)
                {
                    return redirect('/records')->with('message', 'Records Created Successfully');
                } else 
                {
                    return redirect()->back()->with('message', 'Records Could not be saved');
                }
            } else {
                if($this->addSingleRecord($request) != null) 
                {
                    return redirect()->back()->with('message', 'Record Created.');
                } else {
                    return redirect()->back()->with('message', 'Records already exists');
                }
            }
    }

    public function addSingleRecord($request)
    {
        $record = null;
        $diff = null;
        $prev = $this->getPreviousRecord();
        if(!$this->recordExists($request->user_id, $request->month, $request->year)){
            $record = Record::create([
                'month'=>$request->month,
                'year'=>$request->year,
                'reading'=>$request->reading,
                'location_id'=>$request->location_id,
                'status'=>'unpaid',
                'user_id'=>$request->user_id
            ]);
        } 

        return $record;
 }
    public function addAllRecords($request)
    {
        $results = [];
            foreach (User::where('location_id', Session::get('location'))->get() as $user){
           if(!$this->recordExists($user->id, Session::get('month'), Session::get('year')))
                {
                $results[] = Record::create([
                'month'=>Session::get('month'),
                'year'=>Session::get('year'),
                'reading'=>$request->reading,
                'location_id'=>Session::get('location'),
                'status'=>'unpaid',
                'user_id'=>$request->user_id
            ]);
        }

    }
        Session::forget('location');
        Session::forget('month');
        Session::forget('year');

        return $results;
    }


    public function update(Request $request, Record $record)
    {
        $record->reading = $request->reading;
        $record->save();
        return redirect()->back()->with('message', 'Reading Updated');
    }


    public function destroy(Record $record)
    {
        $record->delete();
        return redirect()->back()->with('message', 'Record Deleted');
    }

    /**
     * @param $records
     */
    public function assignPublicAttributes($records)
    {
        if (count($records) > 0) {
            foreach ($records as $record) {
                $p_record = $this->getPreviousRecord($record);
                if (!is_null($p_record)) {

                    $record->previous_reading = (int)$p_record->reading;

                    if(is_object($p_record))
                    {
                        $record->difference = (int)$this->getDifference($record, $p_record);
                    } else {
                         $record->difference = (int)$this->$record->reading;
                    }
                    
                } else {
                    $record->previous_reading = null;
                }
            }
        }
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|null|static[]
     */
    public function getRecords()
    {
        $records = null;

        //set params
        $month = Session::has('records_month') ? Session::get('records_month') : Carbon::now()->month;
        $year = Session::has('records_year') ? Session::get('records_year') : date('Y');
        $location = Session::has('records_location') ? Session::get('records_location') : null;

        if (Session::has('records_month') and Session::has('records_year') and Session::has('records_location')) {

            $records = Record::where([['month', '=', $month], ['year', '=', $year], ['location_id', '=', $location]])->get();
        } else {
            $records = Record::where([['month', '=', $month], ['year', '=', $year],])->get();
        }
        return $records;
    }
}
