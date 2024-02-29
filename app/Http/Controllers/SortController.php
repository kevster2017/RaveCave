<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class SortController extends Controller
{
    public function priceHighLow()
    {
        $events = Event::where('id', '>', 0)
            ->orderBy('price', 'DESC')
            ->get();

        return view('events.index', [
            'events' => $events
        ]);
    }

    public function priceLowHigh()
    {
        $events = Event::where('id', '>', 0)
            ->orderBy('price', 'ASC')
            ->get();

        return view('events.index', [
            'events' => $events
        ]);
    }

    public function AtoZ()
    {
        $events = Event::where('id', '>', 0)
            ->orderBy('title', 'ASC')
            ->get();

        return view('events.index', [
            'events' => $events
        ]);
    }

    public function ZtoA()
    {
        $events = Event::where('id', '>', 0)
            ->orderBy('title', 'DESC')
            ->get();

        return view('events.index', [
            'events' => $events
        ]);
    }

    public function newestOldest()
    {
        $events = Event::where('id', '>', 0)
            ->orderBy('date', 'ASC')
            ->get();

        return view('events.index', [
            'events' => $events
        ]);
    }

    public function oldestNewest()
    {
        $events = Event::where('id', '>', 0)
            ->orderBy('date', 'DESC')
            ->get();

        return view('events.index', [
            'events' => $events
        ]);
    }
}
