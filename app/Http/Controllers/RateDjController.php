<?php

namespace App\Http\Controllers;

use App\Models\RateDj;

use Illuminate\Http\Request;

class RateDjController extends Controller
{
    public function index()
    {

        $ratings = RateDj::where('id', '>', 0)
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('djs.index', [
            'ratings' => $ratings
        ]);
    }


    public function store(Request $request, RateDj $rating)
    {
        $request->validate([
            'stars' => 'required|integer',
            'comment' => 'required|string|max:500',
        ]);

        $rating->user_id = $request->user_id;
        $rating->dj_id = $request->dj_id;
        $rating->name = $request->name;
        $rating->image = $request->image;
        $rating->stars = $request->stars;
        $rating->comment = $request->comment;

        $rating->save();

        return redirect()->back()->with('success', "DJ rating successfullly added");
    }
}
