<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('payments.update')->with('intent', $user->createSetupIntent());
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $paymentMethod = $request->input('payment_method');

        $user->createOrGetStripeCustomer();
        $user->updateDefaultPaymentMethod($paymentMethod);
        return redirect()->intended(route('dashboard'));

    }
}
