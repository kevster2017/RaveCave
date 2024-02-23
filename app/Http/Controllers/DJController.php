<?php

namespace App\Http\Controllers;

use App\Models\DJ;
use App\Models\RateDJ;
use Illuminate\Http\Request;

class DJController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $djs = DJ::where('id', '>', 0)
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('djs.index', [
            'djs' => $djs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('djs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, DJ $dj)
    {

        // dd($request);
        $request->validate([
            'user_id' => 'required',
            'djname' => 'required|string|max:25',
            'image' => 'required|mimes:jpg,jpeg,png,gif',
            'town' => 'required|string|max:25',
            'country' => 'required|string|max:25',
            'genre' => 'required|string|max:25',
            'description' => 'required|string|max:500',
            'social' => 'required|string|max:500',
            'date' => 'required|date',
        ]);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $dj->image = $request->file('image')->store('uploads', 'public');
        } else {
            $dj->image = "/images/liveEvent.jpg";
        }


        $dj->user_id = auth()->user()->id;
        $dj->djname = $request->djname;
        $dj->town = $request->town;
        $dj->country = $request->country;
        $dj->genre = $request->genre;
        $dj->description = $request->description;
        $dj->social = $request->social;
        $dj->date = $request->date;

        $dj->save();

        return redirect()->back()->with('success', "DJ Profile Created");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $dj = DJ::findOrFail($id);
        $dj->load('favouritedBy'); // Eager load the favoritedBy relationship

        // Fetch all rate Djs for the specific Dj
        $rateDjs = RateDJ::where('dj_id', $dj->id)->get();

        // Calculate total number of rate events
        $totalRatingsCount = $rateDjs->count();

        // Calculate total stars awarded
        $totalStars = $rateDjs->sum('stars');

        // Calculate overall average rating
        $rating = ($totalRatingsCount > 0) ? $totalStars / $totalRatingsCount : 0;

        return view('djs.show', [
            'dj' => $dj,
            'rating' => $rating,
            'totalRatingsCount' => $totalRatingsCount
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dj = DJ::find($id);

        return view('djs.edit', ['dj' => $dj]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required',
            'djname' => 'required|string|max:25',
            'image' => 'required|mimes:jpg,jpeg,png,gif',
            'town' => 'required|string|max:25',
            'country' => 'required|string|max:25',
            'genre' => 'required|string|max:25',
            'description' => 'required|string|max:500',
            'social' => 'required|string|max:500',
            'date' => 'required|date',

        ]);


        $dj = DJ::find($id);

        $dj->user_id = auth()->user()->id;

        if (!empty($request->input('djname'))) {
            $dj->name = $request->djname;
        }

        if (!empty($request->hasFile('image'))) {

            $dj->image = $request->file('image')->store('uploads', 'public');
        }

        if (!empty($request->input('town'))) {
            $dj->town = $request->town;
        }

        if (!empty($request->input('country'))) {
            $dj->country = $request->country;
        }

        if (!empty($request->input('genre'))) {
            $dj->genre = $request->genre;
        }

        if (!empty($request->input('description'))) {
            $dj->description = $request->description;
        }

        if (!empty($request->input('social'))) {
            $dj->social = $request->social;
        }

        if (!empty($request->input('date'))) {
            $dj->date = $request->date;
        }



        $dj->save();

        return view('djs.show', $dj->id)->with('success', 'DJ profile successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DJ $dJ)
    {
        //
    }
}
