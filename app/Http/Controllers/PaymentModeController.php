<?php

namespace App\Http\Controllers;

use App\PaymentMode;
use Illuminate\Http\Request;

class PaymentModeController extends Controller
{
    
    public function index()
    {
        $payment_modes = PaymentMode::all();
        return view('payment_modes.index', compact('payment_modes'));
    }


    public function store(Request $request)
    {
        $this->validateInput($request);
        PaymentMode::create($request->all());
        return redirect()->back()->with('message', 'Payment Mode Created Successfully');
    }


    public function update(Request $request, PaymentMode $paymentMode)
    {
        $this->validateInput($request);
        $paymentMode->update($request->all());
        return redirect()->back()->with('message', 'Payment Mode Updated Successfully');
    }

    public function validateInput($request)
    {
        return $this->validate($request, [
            'name'=>'required',
            'description'=>'required'
        ]);
    }

    public function destroy(PaymentMode $paymentMode)
    {
        $paymentMode->delete();
        return redirect()->back()->with('message', 'Item deleted Successfully');
    }
}
