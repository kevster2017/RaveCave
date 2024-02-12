<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Event;

class MessageController extends Controller
{
    public function index()
    {
        if (auth()->user()->isAdmin != 1) {

            return redirect()->back()->with('error', 'You are not authorised to view this page');
        } else {

            $messages = Message::where('id', '>', 0)
                ->orderBy('created_at', 'ASC')
                ->get();

            return view('messages.index', [
                'messages' => $messages
            ]);
        }
    }

    public function store(Request $request, Message $message)
    {

        //dd($request);
        $validatedData = $request->validate([
            'user_id' => 'required',
            'event_id' => 'required',
            'username' => 'required',
            'image' => 'required',
            'message' => 'required'
        ]);

        $message->user_id = $request->user_id;
        $message->event_id = $request->event_id;
        $message->username = $request->username;
        $message->image = $request->image;
        $message->message = $request->message;

        $message->save();

        return response()->json(['success' => true, 'message' => $message]);
    }

    public function show($id)
    {

        $eventId = Event::findOrFail($id);

        $messages = Message::where('event_id', $eventId)
            ->orderBy('created_at', 'ASC')
            ->get();

        return view('events.eventLive', [
            'messages' => $messages
        ]);
    }
}
