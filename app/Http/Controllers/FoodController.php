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
}
