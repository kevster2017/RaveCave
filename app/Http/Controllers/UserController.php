<?php

namespace App\Http\Controllers;

use App\Models\User;
use Faker\Guesser\Name;
use Illuminate\Http\Request;

class UserController extends Controller
{

    function show($id)
    {

        $user = User::findOrFail($id);

        return view('users.show', [
            'user' => $user
        ]);
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('userss.edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'town' => 'required',
            'country' => 'required',
            'username' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,gif',
            'isAdmin' => 'required',

        ]);
    }
}
