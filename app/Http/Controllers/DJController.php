<?php

namespace App\Http\Controllers;

use App\Models\DJ;
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


        return view('djs.show', [
            'dj' => $dj
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DJ $dJ)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DJ $dJ)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DJ $dJ)
    {
        //
    }
}
