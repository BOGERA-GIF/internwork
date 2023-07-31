<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password', 'role');

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
