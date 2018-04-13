<?php 

namespace App\Helpers;
use App\Record;

class Helpers {
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

    public function getDifference($curr, $prev)
    {
        $diff = null;
     if(is_object($curr))
     {
         if(!is_object($prev))
         {
             $diff = (int)$curr->reading;
         } else {
             $d =  (int)$curr->reading - (int)$prev->reading;
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
}