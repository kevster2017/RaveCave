<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home()
    {

        if (auth()->user()->isAdmin == 1) {
            return view('admins.home');
        } else {
            return redirect()->back()->with('error', 'You are not authorised to view this page');
        }
    }
}
