<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8,confirmed',
        ]);
        // Validate input
        if (!User::exists()) {
            # code...
            // Create user
            $user = User::create([
                'name'     => $validated['name'],
                'email'    => $validated['email'],
                'password' => $validated['password'],
                'role' => 'admin'
            ]);
        } else {
            # code...
            $user = User::create([
                'name'     => $validated['name'],
                'email'    => $validated['email'],
                'password' => $validated['password'],
            ]);
        }
        // Redirect or return response
        return redirect()->route('loginview')->with('success', 'Registration successful!');
    }


    public function login(Request $request) { 
        // Validate input *
        // dd('ici');
        $credentials = $request->validate([ 
            'email' => 'required|email', 
            'password' => 'required|string', 
        ]); 
        // Attempt login 
        if (Auth::attempt($credentials)) { 
            // Regenerate session to prevent fixation 
            $request->session()->regenerate(); 
            return redirect()->route('colocations.index') ->with('success', 'You are logged in!'); 
        } 
        // If login fails 
        return back()->withErrors([ 'email' => 'The provided credentials do not match our records.' ]);
    }

    public function ban($id)
    {
        $user=User::find($id);
        $user->is_banned=true;
        $user->save();
        return to_route('login')->with('message','vous etes banni vous pouvez pas se connecter');
    }

    public function logout(Request $request)
    {
        $user = Auth::user();
        
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login')->with('success', 'Logged out successfully');
    }

}
