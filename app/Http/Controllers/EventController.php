<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

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
            'userID' => 'required',
            'dj' => 'required',
            'video' => 'required|mimes:mp4,avi,mov,wmv',
            'title' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,gif',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'description' => 'required',
        ]);
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
    public function edit(Event $event)
    {
        //
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
