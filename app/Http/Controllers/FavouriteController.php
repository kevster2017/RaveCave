<?php

namespace App\Http\Controllers;

use App\Models\DJ;
use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    public function addTofollows(DJ $id)
    {
        auth()->user()->follows()->syncWithoutDetaching([$id->id]);
        return redirect()->back()->with('success', 'You are now following.');
    }

    public function removeFromfollows(DJ $id)
    {
        auth()->user()->follows()->detach($id->id);
        return redirect()->back()->with('success', 'You have unfollowed.');
    }
}
