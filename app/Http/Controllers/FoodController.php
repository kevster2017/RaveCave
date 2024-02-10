<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    //
    public function index()
    {
        $foods = Food::where('id', '>', 0)
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('foods.index', [
            'foods' => $foods
        ]);
    }

    public function create()
    {
        return view('foods.create');
    }

    public function store(Request $request, Food $food)
    {

        // dd($request);
        $request->validate([
            'user_id' => 'required',
            'businessName' => 'required|string|max:25',
            'image' => 'required|mimes:jpg,jpeg,png,gif',
            'town' => 'required|string|max:25',
            'type' => 'required|string|max:25',
            'description' => 'required|string|max:500',
            'webLink' => 'required|string|max:500',

        ]);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $food->image = $request->file('image')->store('uploads', 'public');
        } else {
            $food->image = "/images/burger.jpg";
        }


        $food->user_id = auth()->user()->id;
        $food->businessName = $request->businessName;
        $food->town = $request->town;
        $food->type = $request->type;
        $food->description = $request->description;
        $food->webLink = $request->webLink;

        $food->save();

        return redirect()->back()->with('success', "Food Profile Created");
    }
}
