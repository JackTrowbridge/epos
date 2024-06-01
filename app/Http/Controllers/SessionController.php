<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class SessionController extends Controller
{
    public function create(){

        $user = Auth::user();

        if($user == null){
            return redirect('/');
        }

        return Inertia::render('TillScreen', [
            'user' => $user
        ]);
    }
    public function store(Request $request)
    {

        $request->validate([
            'passcode' =>'required',
        ]);

        $user = User::where('passcode', $request->input('passcode'))->first();

        if(!$user){
            return redirect('/')->with('error', 'Invalid passcode');
        }

        Auth::login($user);
        return Inertia::render('TillScreen', [
            'user' => $user
        ]);

    }
    public function destroy(Request $request)
    {
        Auth::logout();
        return redirect('/')->with('flash', 'Goodbye!');
    }
}
