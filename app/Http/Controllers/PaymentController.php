<?php

namespace App\Http\Controllers;

use App\Payment, App\Record;
use Illuminate\Http\Request;
use App\Helpers\Helpers;

class PaymentController extends Controller
{
    
    public function index()
    {
        //
    }

    
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'amount'=>'required'
        ]);
        

        $record = Record::findOrFail($request->all()['record_id']);
        $helper = new Helpers();
        $pre = $helper->getPreviousRecord($record);
        $diff = (int)$helper->getDifference($record, $pre);

        $record->status = ((int)$request->amount/($diff*50)) * 100;
        $record->save();
        Payment::create($request->all());
        return redirect()->back()->with('success', 'Payment successfully Saved');
    }

    
    public function show(Payment $payment)
    {
        //
    }

    
    public function edit(Payment $payment)
    {
        //
    }

    
    public function update(Request $request, Payment $payment)
    {
        //
    }

    
    public function destroy(Payment $payment)
    {
        //
    }
}
