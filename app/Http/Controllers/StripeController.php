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
        return view('stripe');
    }

    public function stripePost(Request $request)
    {

        $userId = auth()->user()->id;
        $fullCart = Cart::where('userID', $userId)
            ->get();

        foreach ($fullCart as $cart) {
            $ticket = Ticket::where('userId', $userId)->get();

            $ticket->userId = $cart->userId;
            $ticket->paymentStatus = "Paid";
        }

        $total = DB::table('cart')
            ->join('tickets', 'cart.ticket_id', '=', 'tickets.id')
            ->where('cart.userId', $userId)
            ->sum('tickets.price');

        $total = ($total * 100);

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create([
            "amount" => $total,
            "currency" => "GBP",
            "source" => $request->stripeToken,
            "description" => "This payment is testing purpose of The Rave Cave"
        ]);

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
