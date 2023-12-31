<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create() {
        return view('sessions.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!auth()->attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Neispravna e-mail adresa',
                'password' => 'Neispravna lozinka'
            ]);
        }

        session()->regenerate();

        return redirect('/')->with('success', 'Dobrodošli');
    }

    public function destroy() {
        Auth::logout();

        return redirect('/')->with('success', 'Doviđenja');
    }
}
