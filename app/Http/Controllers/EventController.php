<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
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

        return view('events.show', [
            'event' => $event
        ]);
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
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}
