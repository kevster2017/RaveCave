<?php

namespace App\Http\Controllers;

use App\Models\DJ;
use App\Models\Favourite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FavouriteController extends Controller
{
    public function index()
    {

        $userId = auth()->user()->id;

        $favourites = DB::table('favourites')
            ->join('djs', 'favourites.dj_id', '=', 'djs.id')
            ->where('favourites.user_id', $userId)
            ->select('djs.*', 'favourites.id as favourites_id')
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
