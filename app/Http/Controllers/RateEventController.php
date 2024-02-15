<?php

namespace App\Http\Controllers;

use App\Models\RateEvent;

use Illuminate\Http\Request;

class RateEventController extends Controller
{
    public function index()
    {
        $ratings = RateEvent::where('id', '>', 0)
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('events.index', [
            'ratings' => $ratings
        ]);
    }

    public function store(Request $request, RateEvent $rating)
    {

        dd($request);

        $request->validate([
            'stars' => 'required|integer',
            'message' => 'required|string|max:500',
        ]);



        $rating->user_id = $request->user_id;
        $rating->event_id = $request->event_id;
        $rating->name = $request->name;
        $rating->image = $request->image;
        $rating->stars = $request->stars;
        $rating->message = $request->message;



        $rating->save();

        return redirect()->back()->with('success', "Event rating successfully added");
    }
}
