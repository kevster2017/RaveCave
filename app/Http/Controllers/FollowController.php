<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Follow;
use App\Models\User;

use Illuminate\Http\Request;

class FollowController extends Controller
{

    public function index()
    {

        $follows = Follow::where('id', auth()->user()->id)
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('follows.index', [
            'follows' => $follows
        ]);
    }
    public function addTofollows(Follow $follow, Request $request)
    {
        $follow->user_id = $request->user_id;
        $follow->event_id = $request->event_id;
        $follow->save();
        return redirect()->back()->with('success', 'You are now following this event');
    }

    public function removeFromFollows($id)
    {
        Follow::destroy($id);

        return redirect()->back()->with('success', 'You are no longer following this event');
    }
}
