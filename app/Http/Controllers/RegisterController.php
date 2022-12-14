<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        //create the user and validate the information
        $attributes = request()->validate([
            'name' => 'required|max:255|min:3',
            'username' => ['required', 'min:3', 'max:25', Rule::unique('users', 'username')],
            'email' => ['required', 'email', 'min:3', 'max:25', Rule::unique('users', 'email')],
            'password' => 'required|min:7|max:255',
        ]);

        //Hash the password
        $attributes['password'] = bcrypt($attributes['password']);

        //Create User
        $user = User::create($attributes);

        //Log the user in
        auth()->login($user);

        //Flash message if the User has been registered while redirecting to the home page
        return redirect('/')->with('succes', 'Your account has been created');
    }

    public function index(User $user) {
        return view ('user.my-account', ['user' => $user]);
    }

    public function edit(User $user) {
        return view ('user.edit', ['user' => $user]);
    }

    public function update(User $user)
    {
        $attributes = request()->validate([
            'name' => 'required|max:255|min:3',
            'username' => ['required', 'min:3', 'max:25', Rule::unique('users', 'username')->ignore($user->id)],
            'email' => ['required', 'email', 'min:3', 'max:25', Rule::unique('users', 'email')->ignore($user->id)],
            'password' => 'required|min:7|max:255',
        ]);

        //Hash the password
        $attributes['password'] = bcrypt($attributes['password']);

        $user->update($attributes);

        return redirect('/')->with('succes', 'Information Updated!');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect('/')->with('succes', 'Your account is deleted');
    }
}
