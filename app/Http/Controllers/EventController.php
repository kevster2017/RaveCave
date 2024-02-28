<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Ticket;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Models\RateEvent;
use Intervention\Image\Facades\Image;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::where('id', '>', 0)
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('events.index', [
            'events' => $events
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Event $event)
    {


        $request->validate([
            'userID' => 'required|exists:users,id',
            'dj' => 'required|string|max:255',
            'video' => 'required|mimes:mp4,avi,mov,wmv',
            'title' => 'required|string|max:255',
            'image' => 'required|mimes:jpg,jpeg,png,gif',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'description' => 'required|string|max:500',
        ]);


        // Images without using image/intervention
        if ($request->hasFile('image')) {
            $event->image = $request->file('image')->store('uploads', 'public');
        } else {
            $event->image = "/images/liveEvent.jpg";
        }

        $event->userID = $request->userID;
        $event->dj = $request->dj;
        $event->video = $request->file('video')->store('uploads', 'public');
        $event->title = $request->title;
        $event->date = $request->date;
        $event->time = $request->time;
        $event->description = $request->description;


        $event->save();

        return redirect()->back()->with('success', "Event added");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);
        $followerCount = $event->followedBy()->count();

        $user = Auth()->user()->id;

        $ticket = Ticket::where('userId', $user)
            ->where('event_id', $event->id)
            ->first();

        if ($ticket !== null && isset($ticket->event_id)) {
            // Fetch all rate events for the specific event
            $rateEvents = RateEvent::where('event_id', $ticket->event_id)->get();


            // Calculate total number of rate events
            $totalRatingsCount = $rateEvents->count();

            // Calculate total stars awarded
            $totalStars = $rateEvents->sum('stars');

            // Calculate overall average rating
            $rating = ($totalRatingsCount > 0) ? $totalStars / $totalRatingsCount : 0;
            // dd($ticket->paymentStatus);

            return view('events.show', [
                'event' => $event,
                'ticket' => $ticket,
                'rating' => $rating,
                'totalRatingsCount' => $totalRatingsCount,
                'followerCount' => $followerCount,

            ]);
        } else {

            $rating = 0;
            return view('events.show', [
                'event' => $event,
                'ticket' => $ticket,
                'rating' => $rating,
                'followerCount' => $followerCount,
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $event = Event::find($id);

        return view('events.edit', ['event' => $event]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'userID' => 'required|exists:users,id',
            'dj' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'description' => 'required|string|max:500',
        ]);

        $event = Event::find($id);

        $event->userID = auth()->user()->id;

        // Mass assignment to update model attributes in bulk
        $event->fill($request->except(['_token', '_method', 'image', 'video']));

        if ($request->hasFile('image')) {
            $event->image = $request->file('image')->store('uploads', 'public');
        }

        if ($request->hasFile('video')) {
            $event->video = $request->file('video')->store('uploads', 'public');
        }

        $event->save();

        return redirect()->route('events.show', $event->id)->with('success', 'Event details successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function join($id)
    {
        $event = Event::findOrFail($id);

        $user = Auth()->user()->id;

        $ticket = Ticket::where('userId', $user)
            ->where('event_id', $event->id)
            ->first();

        if ($ticket->redeemed == true) {
            return redirect()->route('eventLive', $ticket->event_id);
        }

        if ($ticket) {

            return view('events/eventDoor', compact('event', 'ticket'));
        } else {
            return redirect()->back()->with('error', 'Please purchase a ticket for this event');
        }
        // dd($ticket->paymentStatus);


    }

    public function eventLive($id)
    {
        $event = Event::findOrFail($id);

        $user = Auth()->user()->id;

        $ticket = Ticket::where('userId', $user)
            ->where('event_id', $event->id)
            ->first();

        $messages = Message::where('event_id', $event)
            ->orderBy('created_at', 'ASC')
            ->get();

        // dd($ticket->paymentStatus);

        return view('events/eventLive', [
            'event' => $event,
            'ticket' => $ticket,
            'messages' => $messages
        ]);
    }

    public function destroy(Event $event)
    {
        //
    }
}
