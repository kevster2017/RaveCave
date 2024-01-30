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



    function myTickets()
    {

        /* Get auth users id, get booking */
        $userId = auth()->user()->id;

        $tickets = DB::table('tickets')
            ->where('userId', $userId)
            ->get();

        return view('/tickets/myTickets', ['tickets' => $tickets]);
    }
}
