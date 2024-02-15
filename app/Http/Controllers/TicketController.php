<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Cart;
use App\Models\RateEvent;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TicketController extends Controller
{
    public function addToCart(Request $request)
    {
        $cart = new Cart;
        $cart->userId = auth()->user()->id;
        $cart->name = $request->name;
        $cart->eventId = $request->eventId;
        $cart->dj = $request->dj;
        $cart->date = $request->date;
        $cart->time = $request->time;
        $cart->price = $request->price;
        $cart->image = $request->image;
        $cart->title = $request->title;

        $cart->save();

        return redirect('/tickets/viewCart')->with('success', 'Ticket added to cart');
    }

    public function viewCart()
    {

        // Get auth userID
        $userId = auth()->user()->id;

        // Find userID in the Cart
        $cart = Cart::where('userId', $userId)
            ->first();

        // Check if the cart is empty, return cart if not empty
        if ($cart === null) {
            return back()->with('error', 'No items in cart');
        } else {

            return view('tickets.viewCart', ['cart' => $cart]);
        }
    }


    function bookNow()
    {

        $userId = auth()->user()->id;

        $cart = DB::table('cart')
            ->where('user_id', $userId)
            ->first();


        return view('tickets.review', ['cart' => $cart]);
    }

    function buyTicket(Request $req)
    {

        // Get the auth user's cart details
        $userId = auth()->user()->id;
        $fullCart = Cart::where('userId', $userId)
            ->get();


        // Loop through cart and create new ticket
        foreach ($fullCart as $cart) {
            $order = new Ticket;
            $order->hotelId = $cart->hotelId;
            $order->userId = $cart->userId;
            $order->name = $req->name;
            $order->status = "Pending";
            $order->address = $req->address;
            $order->payment_method = $req->payment;
            $order->payment_status = "Pending";
            $order->save();
        }

        // Check and redirect based on method of payment
        if ($order->payment_method == 'Online') {
            return redirect('/orders/stripe');
        }

        if ($order->payment_method == 'PayPal') {
            $total = DB::table('cart')
                ->join('tickets', 'cart.ticket_id', '=', 'tickets.id')
                ->where('cart.user_id', $userId)
                ->sum('tickets.price');

            return view('/tickets/paypal', ['total' => $total]);
        } else {
            return redirect('/tickets/stripe');
        }
    }

    function myTickets()
    {

        /* Get auth users id, get ticket */
        $userId = auth()->user()->id;

        $tickets = DB::table('tickets')
            ->where('userId', $userId)
            ->get();

        return view('/tickets/myTickets', ['tickets' => $tickets]);
    }


    public function show(string $id)
    {
        $ticket = Ticket::findOrFail($id);
        return view('/tickets/show', ['ticket' => $ticket]);
    }

    public function removeCart($id)
    {
        Cart::destroy($id);

        return redirect()->route('home')->with('success', 'Item successfully removed from cart');
    }
}
