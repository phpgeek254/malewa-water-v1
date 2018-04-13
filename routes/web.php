<?php

use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
function monthToText($number)
{
	return  date("F", mktime(0, 0, 0, $number, 10));
}

function insertRecords()
{
    $file = fopen('jan.txt', 'r');
    $count = 0;
    while (!feof($file)) {
        // Create Users:
        // $count +=1;
        //    $line = fgets($file);
        //    App\User::create([
        // 	'name' => $line,
        // 	'email'  =>strtolower($line.$count.random_int(1000, 100000).'@gmail.com'),
        // 	'phone_number'=>12345678,
        // 	'location_id'=>16,
        // 	'user_level'=>'user',
        // 	'password'=>bcrypt(strtolower($line))
        // ]);
        //    echo $count.' ==== '.$line.'<br />';
        foreach (App\User::where('location_id', '=', 15)->get() as $user) {
            $line = fgets($file);
            $count += 1;
            // App\Record::create([
            //    'user_id'=>$user->id,
            //    'month'=>11,
            //    'year'=>2016,
            //    'reading'=>(int)$line,
            //    'status'=>'unpaid',
            //    'location_id'=>15
            // ]);
            echo $count . ' ----------' . $user->name . ' ==== ' . (int)$line . '<br />';
        }


    }
}

Route::get('/', function () {
    return view('welcome');
});

Route::post('specs', function(Request $request){
	Session::put('location', $request->all()['location']);
	Session::put('month', $request->all()['month']);
	Session::put('year', $request->all()['year']);
	return redirect(route('records.create'));
})->name('specs');

Route::resource('users', 'UserController');
Route::resource('cheques', 'CheckController');
Route::resource('records', 'RecordController');
Route::resource('locations', 'LocationController');
Route::resource('payments', 'PaymentController');
Route::resource('payment_modes', 'PaymentModeController');

Route::resource('reciepts', 'RecieptController');

Route::post('year_records', function ( Request $request ){
 	Session::put('user_year', $request->year);
 	return redirect(route('users.show', ['id'=>$request->user_id]));
})->name('yearly_user_records');

Route::post('search_user', function(Request $request){
    Session::put('user_results', $request->user_results);
    $users = User::where()->get();
    return redirect(route('users.index', compact('users')));
})->name('search_user');
Auth::routes();


Route::get('/charts/{name}/{height}/{user_id}', 'ChartController@show')->name('chart');

Route::get('test', function(){
    $record = Record::find(774);
});
