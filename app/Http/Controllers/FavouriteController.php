<?php

namespace App\Http\Controllers;

use App\Models\DJ;
use App\Models\Favourite;
use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    public function index()
    {

        $favourites = Favourite::where('id', auth()->user()->id)
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('favourites.index', [
            'favourites' => $favourites
        ]);
    }

    public function addTofavourites(DJ $id)
    {
        auth()->user()->favourites()->syncWithoutDetaching([$id->id]);
        return redirect()->back()->with('success', 'You are now favourites.');
    }

    public function removeFromfavourites(DJ $id)
    {
        auth()->user()->favourites()->detach($id->id);
        return redirect()->back()->with('success', 'You have favourites.');
    }
}
