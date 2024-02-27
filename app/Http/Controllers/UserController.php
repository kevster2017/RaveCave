<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ticket;
use App\Models\Favourite;
use App\Models\Follow;
use Faker\Guesser\Name;
use Illuminate\Http\Request;

class UserController extends Controller
{

    function index()
    {
        if (auth()->user()->isAdmin != 1) {

            return redirect()->back()->with('error', 'You are not authorised to view this page');
        } else {

            $users = User::where('id', '>', 0)
                ->orderBy('id', 'DESC')
                ->get();

            return view('users.index', [
                'users' => $users
            ]);
        }
    }

    function show($id)
    {

        $user = User::findOrFail($id);

        $favourites = Favourite::where('user_id', $id)
            ->count();



        $follows = Follow::where('user_id', $id)
            ->count();

        $tickets = Ticket::where('userId', $id)
            ->count();


        return view('users.show', [
            'user' => $user,
            'favourites' => $favourites,
            'follows' => $follows,
            'tickets' => $tickets,

        ]);
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('users.edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        // dd($request);

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
            $user->email = $request->email;
        }

        if (!empty($request->input('town'))) {
            $user->town = $request->town;
        }
        if (!empty($request->input('country'))) {
            $user->country = $request->country;
        }

        if (!empty($request->input('username'))) {
            $user->username = $request->username;
        }
        if (!empty($request->input('isAdmin'))) {
            $user->isAdmin = $request->isAdmin;
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

        if (auth()->user()->isAdmin == 1) {
            return redirect()->back()->with('success', 'User Profile successfully deleted');
        } else {
            return redirect()->route('home')->with('success', 'User Profile successfully deleted');
        }
    }
}
