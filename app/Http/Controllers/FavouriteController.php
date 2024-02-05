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

    public function addTofavourites(Favourite $favourite, Request $request)
    {

        $favourite->user_id = $request->user_id;
        $favourite->dj_id = $request->dj_id;
        $favourite->save();

        return redirect()->back()->with('success', 'Added to favourites.');
    }

    public function removeFromfavourites($id)
    {

        Favourite::destroy($id);

        return redirect()->back()->with('success', 'Removed from favourites.');
    }
}
