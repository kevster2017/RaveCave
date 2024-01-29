<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Stripe;

class StripeController extends Controller
{
    public function stripe()
    {
        return view('stripe');
    }

    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create([
            "amount" => 100 * 100,
            "currency" => "GBP",
            "source" => $request->stripeToken,
            "description" => "This payment is testing purpose of The Rave Cave"
        ]);

        return redirect('/home')->with('success', 'Payment Successful');
    }
}
