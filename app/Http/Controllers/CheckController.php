<?php

namespace App\Http\Controllers;

use App\Check;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckController extends Controller
{

    public function index()
    {
        $cheques = Check::orderByDesc('created_at')->paginate(10);
        return view('cheques.index', compact('cheques'));
    }


    public function store(Request $request)
    {
        $this->validateRequest($request);

        Check::create($this->setAttributes($request));
        return redirect()->back()->with('message', 'Cheque Successfully saved');

    }


    public function show($id)
    {
        $cheque = Check::findOrFail($id);
        return view('cheques.show', compact('cheque'));
    }

    public function update(Request $request, $id)
    {
        $check = Check::findOrFail($id);
        $this->validateRequest($request);
        $check->update($this->setAttributes($request));
        return redirect()->back()->with('message', 'Cheque Successfully saved');
    }


    public function destroy($id)
    {
        $check = Check::findOrFail($id);
        $check->delete();
        return redirect()->back()->with('message', 'Record Deleted');
    }


    public function validateRequest(Request $request)
    {
        $this->validate($request, ['check_number' => 'required', 'purpose' => 'required', 'payed_to' => 'required', 'amount' => 'required',]);
    }

    /**
     * @param Request $request
     * @return array
     */
    public function setAttributes(Request $request)
    {
        return ['check_number' => $request->check_number, 'purpose' => $request->purpose, 'payed_to' => $request->payed_to, 'amount' => $request->amount, 'user_id' => Auth::id() ?: 0,];
    }
}
