<?php

namespace App\Http\Controllers;
use App\User, App\Location, App\Record;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use ConsoleTVs\Charts\Facades\Charts;


class UserController extends Controller
{
    public $destination = 'profile_images/';

    public function index()
    {
        $locations = Location::with('users')->get();
        return view('auth.index', compact( 'locations'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|string',
            'phone_number'=>'integer',
            'email'=>'email',
            'profile_image'=>'image|mimes:jpg,png,gif,jpeg'
        ]);


        $profile_image = null;
        if($file = $request->file('profile_image'))
        {
            $file_name = uniqid().$file->getClientOriginalName();
            $profile_image = $this->destination.$file_name;
            $file->move($this->destination, $file_name);
        } else {
            $profile_image = $this->destination.'default.jpg';
        }

         User::create(
            [
                'name'=>$request->name,
                'phone_number'=>$request->phone_number,
                'email'=>$request->email,
                'location_id'=>$request->location_id,
                'profile_image'=>$profile_image,
                'password'=>bcrypt($request->email),
                'user_level'=>'user'

            ]);
        return redirect()->back()->with('message', 'User Created Successfully');
    }

    public function show($id)
    {

        $year = Session::has('user_year') ? Session::get('user_year') : date('Y'); 
        $user = User::findOrFail($id);
        $records = Record::where([
            ['user_id', '=', $user->id],
            ['year', '=', $year],
        ])->orderBy('month', 'ASC')->with('payments')->get();
        $labels = [];
        $data = [];

        foreach ($records as $record)
        {
            $labels[] = $record->month;
            $data[] = $record->reading;
        }

        // dd($labels);
        $chart = Charts::create('bar', 'Chartjs' )
            ->elementLabel('Water Usage')
            ->height(300)
            ->labels($labels)
            ->values($data)
            ->width(0)
            ->title('Water Usage');
        return view('auth.show', compact('user', 'records', 'year', 'chart'));

    }


    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'=>'required|string',
            'phone_number'=>'integer',
            'email'=>'email',
            'profile_image'=>'image|mimes:jpg,png,gif,jpeg'
        ]);

        $user = User::findOrFail($id);
//        dd($user);
        $profile = null;
        if($request->file('profile_image'))
        {
            $file = $request->file('profile_image');
            if(file_exists(public_path().'/'.$user->profile_image))
            {
                unlink(public_path().'/'.$user->profile_image);
            }
            $file_name = uniqid().$file->getClientOriginalName();
            $profile = $this->destination.$file_name;
            $file->move($this->destination, $file_name);
        } 
         $user->update(
            [
                'name'=>$request->name,
                'phone_number'=>$request->phone_number,
                'email'=>$request->email,
                'location_id'=>$request->location_id,
                'profile_image'=>$profile,
                'password'=>bcrypt($request->email),
                'user_level'=>'user'

            ]);
        return redirect()->back()->with('message', 'User Updated Successfully');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        foreach ($user->records as $record) {
            $record->delete();
        }
        $user->delete();
        return redirect()->back()->with('message', 'User Successfully Deleted');
    }
}
