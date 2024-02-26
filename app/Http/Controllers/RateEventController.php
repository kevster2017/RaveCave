<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use App\Models\RateEvent;

use Illuminate\Http\Request;

class RateEventController extends Controller
{
    public function index()
    {
        $ratings = RateEvent::where('id', '>', 0)
            ->orderBy('created_at', 'DESC')
            ->get();

        $user = User::where('id', auth()->user()->id)
            ->first();

        return view('rateEvents.index', [
            'ratings' => $ratings,
            'user' => $user
        ]);
    }

    public function store(Request $request, RateEvent $rating)
    {

        // dd($request);

        $request->validate([
            'stars' => 'required|integer',
            'comment' => 'required|string|max:500',
        ]);



        $rating->user_id = $request->user_id;
        $rating->event_id = $request->event_id;
        $rating->name = $request->name;
        $rating->image = $request->image;
        $rating->stars = $request->stars;
        $rating->comment = $request->comment;



        $rating->save();

        return redirect()->back()->with('success', "Event rating successfully added");
    }


    public function show($id)
    {


        $event = Event::where('id',  $id)
            ->orderBy('created_at', 'DESC')
            ->firstOrFail();

        $ratings = RateEvent::where('event_id', $event->id)
            ->orderBy('created_at', 'DESC')
            ->get();

        $user = User::where('id', auth()->user()->id)
            ->first();

        // dd($user);

        return view('rateEvents.show', [
            'ratings' => $ratings,
            'user' => $user
        ]);
    }

    public function destroy($id)
    {
        RateEvent::destroy($id);

        return redirect()->route('Events.index')->with('success', 'Event Rating successfully deleted');
    }
}
