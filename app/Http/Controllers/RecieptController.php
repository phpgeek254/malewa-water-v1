<?php

namespace App\Http\Controllers;
use App\Record;
use Illuminate\Support\Facades\Session;

class RecieptController extends Controller
{
//    public function index()
//    {
//    	$records = null;
//    	$year = Session::has('reciept_year') ? Session::has('reciept_year') : date('Y');
//    	$month = Session::has('reciept_month') ? Session::has('reciept_month') : date('m');
//    	$location = Session::has('reciept_location') ? Session::has('reciept_location') : null;
//    	if(Session::has('reciept_month') and Session::has('reciept_year') and Session::has('reciept_location')){
//    		$records = Record::where([
//    			['month', '=', $month ],
//    			['year', '=', $year ],
//    			['location', '=', $location ]
//    		])->get();
//    	} else {
//    		$records = Record::where([
//    			['month', '=', $month ],
//    			['year', '=', $year ],
//    		])->get();
//    	}
//
//    	return view('reciepts.index', compact('records'));
//    }

    public function create()
    {

    }
}
