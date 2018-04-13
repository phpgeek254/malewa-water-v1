<?php

namespace App\Http\Controllers;

class ChartController extends Controller
{
    public function show($name, $height, $user_id)
    {
        return view('charts.'.$name, compact('height', 'user_id'));
    }

}
