<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class RegisterController extends Controller
{
    public function create()
    {
        return Inertia::render('/');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'passcode' => ['required', 'min:4', 'unique:App\Models\User']
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'passcode' => $request->input('passcode')
        ]);

        Auth::login($user);

        return redirect('/');

    }

}
