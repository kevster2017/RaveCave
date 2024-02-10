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

        return view('foods.show', $food->id)->with('success', "Food Profile Created");
    }

    public function show($id)
    {
        $food = Food::findOrFail($id);

        return view('foods.show', [
            'food' => $food
        ]);
    }

    public function edit($id)
    {
        $food = Food::find($id);

        return view('foods.edit', ['food' => $food]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required',
            'businessName' => 'required|string|max:25',
            'town' => 'required|string|max:25',
            'type' => 'required|string|max:25',
            'description' => 'required|string|max:500',
            'webLink' => 'required|string|max:500',

        ]);


        $food = Food::find($id);

        $food->user_id = auth()->user()->id;

        // Mass assignment to update model attributes in bulk
        $food->fill($request->except(['_token', '_method', 'image']));

        if (!empty($request->hasFile('image'))) {

            $food->image = $request->file('image')->store('uploads', 'public');
        }


        $food->save();

        return redirect()->route('foods.show', $food->id)->with('success', 'Food business profile updated successfully!');
    }


    public function destroy($id)
    {
        //
    }
}
