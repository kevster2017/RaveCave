<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

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

        return redirect()->back()->with('success', 'Message successfully sent');
    }
}
