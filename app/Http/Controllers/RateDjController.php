<?php

namespace App\Http\Controllers;

use App\Models\RateDj;
use App\Models\DJ;
use App\Models\User;

use Illuminate\Http\Request;

class RateDjController extends Controller
{
    public function index()
    {

        $ratings = RateDj::where('id', '>', 0)
            ->orderBy('created_at', 'DESC')
            ->get();

        $user = User::where('id', auth()->user()->id)
            ->first();

        return view('rateDjs.index', [
            'ratings' => $ratings,
            'user' => $user
        ]);
    }

    public function show($id)
    {


        $djId = DJ::where('id', '>', $id)
            ->orderBy('created_at', 'DESC')
            ->get();


        $ratings = RateDj::where('dj_id', '>', $djId)
            ->orderBy('created_at', 'DESC')
            ->get();


        $user = User::where('id', auth()->user()->id)
            ->first();

        //dd($ratings);
        return view('rateDjs.show', [
            'ratings' => $ratings,
            'user' => $user,
        ]);
    }


    public function store(Request $request, RateDj $rating)
    {

        //dd($request);
        $request->validate([
            'stars' => 'required|integer',
            'comment' => 'required|string|max:500',
        ]);


        $rating->user_id = $request->user_id;
        $rating->dj_id = $request->dj_id;
        $rating->djName = $request->djName;
        $rating->name = $request->name;
        $rating->image = $request->image;
        $rating->stars = $request->stars;
        $rating->comment = $request->comment;

        $rating->save();

        return redirect()->back()->with('success', "DJ rating successfullly added");
    }


    public function destroy($id)
    {
        RateDj::destroy($id);

        return redirect()->route('djs.index')->with('success', 'DJ Rating successfully deleted');
    }
}
