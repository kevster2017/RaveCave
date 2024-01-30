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
    public function addToCart()
    {
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
