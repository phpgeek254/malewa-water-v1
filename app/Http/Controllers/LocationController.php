<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    
    public function index()
    {
       $locations = Location::all();
       return view('locations.index', compact('locations'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|unique:locations'
        ]);
        Location::create($request->all());
        return redirect()->back()->with('message', 'Location created');
    }

    public function show(Location $location)
    {
        $location->with('users');
         return view('locations.show', compact('location'));

    }



    public function update(Request $request, Location $location)
    {
        $this->validate($request, [
            'name'=>'required|unique:locations'
        ]);
        $location->update($request->all());
        return redirect('/locations')->with('message', 'Location Updated');
    }

    public function destroy(Location $location)
    {
        $location->delete();
         return redirect()->back()->with('message', 'Location Deleted');
    }
}
