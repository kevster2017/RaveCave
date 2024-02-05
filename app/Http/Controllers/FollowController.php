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
    public function addTofollows(Event $id)
    {
        auth()->user()->follows()->syncWithoutDetaching([$id->id]);
        return redirect()->back()->with('success', 'Item added to follows.');
    }

    public function removeFromfollows(Event $id)
    {
        auth()->user()->follows()->detach($id->id);
        return redirect()->back()->with('success', 'Item removed from follows.');
    }
}
