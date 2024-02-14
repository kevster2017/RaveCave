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
}
