<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    public function addToFavorites(Item $item)
    {
        auth()->user()->favorites()->syncWithoutDetaching([$item->id]);
        return redirect()->back()->with('success', 'Item added to favorites.');
    }

    public function removeFromFavorites(Item $item)
    {
        auth()->user()->favorites()->detach($item->id);
        return redirect()->back()->with('success', 'Item removed from favorites.');
    }
}
