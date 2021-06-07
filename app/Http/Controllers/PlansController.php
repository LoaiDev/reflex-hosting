<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use Laravel\Cashier\Exceptions\IncompletePayment;
use Session;
use Carbon\Carbon;

class PlansController extends Controller
{
    public function index()
    {
        return view('create');
    }

    public function show(Plan $plan)
    {
        return view('plans.show')->with('plan', $plan);
    }

    public function create(Plan $plan, Request $request)
    {
        Session::put('cart', [
            'plan_id' => $plan->id,
            'egg_id' => $request->input('jar')
        ]);
        return redirect(route('plan.checkout'));
    }

    public function checkout(Request $request)
    {
        $cart = Session::get('cart');
        if (!$cart) {
            return redirect(route('create'));
        }
        $plan = Plan::findOrFail($cart['plan_id']);
        try {
            $request->user()
                ->newSubscription($request->user()->name . $plan->name . 'server', $plan->price_id)
//                ->trialUntil(Carbon::now()->addMinutes(1))
                ->add();
        } catch (IncompletePayment $exception) {
            return redirect()->route(
                'cashier.payment',
                [$exception->payment->id, 'redirect' => route('payment.successful')]
            );
        }
        Session::remove('cart');
        return redirect(route('payment.successful'));
    }
}
