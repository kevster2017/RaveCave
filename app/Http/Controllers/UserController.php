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

        return view('users.edit', ['user' => $user]);
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

        $user = User::find($id);

        if (!empty($request->input('name'))) {
            $user->name = $request->name;
        }

        if (!empty($request->input('email'))) {
            $user->name = $request->email;
        }

        if (!empty($request->input('town'))) {
            $user->town = $request->town;
        }
        if (!empty($request->input('country'))) {
            $user->country = $request->country;
        }

        if (!empty($request->input('username'))) {
            $user->town = $request->username;
        }
        if (!empty($request->input('isAdmin'))) {
            $user->country = $request->isAdmin;
        }

        if (!empty($request->hasFile('image'))) {

            $user->image = $request->file('image')->store('uploads', 'public');
        }

        $user->save();

        return redirect()->route('users.show', $user->id)->with('success', 'Profile successfully updated');
    }

    public function destroy($id)
    {
        User::destroy($id);

        return redirect()->route('home')->with('success', 'User Profile successfully deleted');
    }
}
