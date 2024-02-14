<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RedeemTicket;

class RedeemTicketController extends Controller
{
    //
    public function index()
    {
        $tickets = RedeemTicket::where('id', '>', 0)
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('redeemTickets.index', [
            'tickers' => $tickets
        ]);
    }

    public function store(Request $request, RedeemTicket $ticket)
    {
        dd($request);

        $ticket->user_id = $request->user_id;
        $ticket->event_id = $request->event_id;
        $ticket->dj_id = $request->dj_id;
        $ticket->ticket_id = $request->ticket_id;
        $ticket->djName = $request->djName;
        $ticket->eventname = $request->eventName;
        $ticket->redeemed = 1;

        $ticket->save();
    }
}
