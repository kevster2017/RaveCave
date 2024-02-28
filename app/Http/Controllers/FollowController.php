<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Follow;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FollowController extends Controller
{

    public function index()
    {

        $userId = auth()->user()->id;

        $follows = DB::table('follows')
            ->join('events', 'follows.event_id', '=', 'events.id')
            ->where('follows.user_id', $userId)
            ->select('events.*', 'follows.id as follows_id')
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

        $event = Event::find($request->event_id);
        $followerCount = $event->followers()->count();

        return redirect()->back()->with(['success', 'You are now following this event', 'followerCount' => $followerCount]);
    }

    public function removeFromFollows($id)
    {
        $follow = Follow::where('event_id', $id)
            ->where('user_id', auth()->id())
            ->first();

        if ($follow) {
            $follow->delete();
            return redirect()->back()->with('success', 'You are no longer following this event');
        } else {
            return redirect()->back()->with('error', 'You are not following this event');
        }
    }
}
