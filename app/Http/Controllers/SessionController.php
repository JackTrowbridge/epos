<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class SessionController extends Controller
{
    public function create(){
        return Inertia::render('/login');
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
        return redirect('/');

    }
    public function destroy(Request $request)
    {
        Auth::logout();
        return redirect('/')->with('success', 'Goodbye!');
    }
}
