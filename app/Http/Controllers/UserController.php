<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(User $user)
    {
        return view('user.index', [
            'user' => $user,
        ]);

        
        
    }

    public function update(User $user, Request $request)
    {


        
        if ($request['email'] == Auth::user()->email) {

            $validated = $request->validate([
                'name' => ['required', 'string', 'min:3', 'max:255'],
                'password' => ['required', Rules\Password::defaults()],
            ]);

        } else {

            $validated = $request->validate([
                'name' => ['required', 'string', 'min:3', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', Rules\Password::defaults()],
            ]);

        }
       

    

        $validated['password'] = Hash::make($request->password);

        $user->update(collect($validated)->all());

        return redirect()->route('user', $user);


    }
}
