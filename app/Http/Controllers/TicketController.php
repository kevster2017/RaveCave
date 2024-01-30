<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Cart;
use App\Models\Event;
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

    public function review()
    {
        $userId = auth()->user()->id;

        // Find auth user ticket details
        $ticket = DB::table('tickets')
            ->where('userId', $userId)
            ->get();


        return view('tickets.review', ['ticket' => $ticket]);
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
