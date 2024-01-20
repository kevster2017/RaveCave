<?php

namespace App\Http\Controllers;

use App\Models\User;

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
}
