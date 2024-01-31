<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Stripe;
use App\Models\Cart;
use App\Models\Ticket;

class StripeController extends Controller
{
    public function stripe()
    {
        return view('tickets.stripe');
    }

    public function stripePost(Request $req)
    {


        $userId = auth()->user()->id;
        $cart = Cart::where('userID', $userId)
            ->first();

        if (!$cart) {
            // Handle the case where the cart is not found
            return redirect()->back()->with('error', 'Cart not found');
        }


        $total = ($cart->price * 100);

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create([
            "amount" => $total,
            "currency" => "GBP",
            "source" => $req->stripeToken,
            "description" => "This payment is testing purpose of The Rave Cave"
        ]);

        /* Create new Ticket */
        $ticket = new Ticket;
        $ticket->name = $cart->name;
        $ticket->userId = $cart->userId;
        $ticket->event_id = $cart->eventId;
        $ticket->title = $cart->title;
        $ticket->dj = $cart->dj;
        $ticket->date = $cart->date;
        $ticket->time = $cart->time;
        $ticket->price = $cart->price;
        $ticket->image = $cart->image;
        $ticket->paymentMethod = "Stripe";
        $ticket->paymentStatus = "Paid";
        $ticket->save();

        Cart::where('userId', $userId)->delete();


        return redirect('/tickets/myTickets')->with('success', 'Payment Successful');
    }


    function orderTicket(Request $req)
    {
        $userId = auth()->user()->id;
        $fullCart = Cart::where('userId', $userId)
            ->get();

        $req->validate([
            'payment' => 'required'
        ]);

        foreach ($fullCart as $cart) {
            $ticket = new Ticket;
            $ticket->ticketId = $cart->ticketId;
            $ticket->userId = $cart->userId;
            $ticket->eventId = $req->eventId;
            $ticket->title = $cart->title;
            $ticket->dj = $req->dj;
            $ticket->date = $cart->date;
            $ticket->time = $req->time;
            $ticket->price = $cart->price;
            $ticket->image = $req->image;
            $ticket->paymentMethod = $req->payment;
            $ticket->paymentStatus = "Pending";
            $ticket->save();
        }

        return redirect('/tickets/stripe')->with('success', 'Order Successful, proceed to payment');
    }
}
