<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password', 'role');

        // Query the database to find the user by account_number
        $user = User::where('email' , $credentials['username'])->first();

        // Check if the user exists and their role is 'customer'
        if (!$user || $user->role !== 'customer') {
            return  back()->withErrors(['error' => 'Invalid credentials. Please try again']);
        }

       // Compute the SHA256 of the provided password and compare it with the one from the database 
       if (hash('sha256' , $credentials['password']) != $user->pin) {
        return back()->withErrors(['error' => 'Invalid credentials. Please try again']);
       }

       // Authentication successful, create a session
       Auth::login($user);

       // Redirect to the customer dashboard
       return redirect('/customer/dashboard');

        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            if (Auth::user()->role == 'admin') {
                return redirect('admin/dashboard');
            } elseif (Auth::user()->role == 'customer') {
                return redirect('/customer/dashboard');
            }
        } else {
            return back()->withErrors(['error' => 'Invalid credentials. Please try again.']);
        }
    }
}
