<?php

namespace App\Http\Controllers;

use App\Models\DJ;
use App\Models\Favourite;
use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    public function index()
    {

        $userId = auth()->user()->id;


        $djs = Favourite::where('user_id', $userId)
            ->with('dj')
            ->get();

        return view('favourites.index', [
            'djs' => $djs
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
        $favourite = Favourite::where('dj_id', $id)
            ->where('user_id', auth()->id())
            ->first();

        if ($favourite) {
            $favourite->delete();
            return redirect()->back()->with('success', 'Removed from favourites.');
        } else {
            return redirect()->back()->with('error', 'You have not favourited this DJ.');
        }
    }
}
