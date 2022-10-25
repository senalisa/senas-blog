<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create()
    {
        //return view of login page
        return view('sessions.create');
    }

    public function store()
    {
        //validate the request
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //attempt to authenticate and log in the user
        //based on the provided credentials
        if (auth()->attempt($attributes)) {
            //redirect with a succes flash message
            return redirect('/')->with('succes', 'Hey, good to see u back. Welcome!');
        }

        // auth failed
        throw ValidationException::withMessages([
            'email' => 'Your provided credentials could not be verified'
        ]);

    }

    //Destroy the session by logging the user out
    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('succes', 'Goodbye! See u soon');
    }
}
