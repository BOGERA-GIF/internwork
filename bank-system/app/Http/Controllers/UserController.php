<?php

// app/Http/Controllers/UserController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{ 


    public function showLoginForm()
    {
        return view('users.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('users')->attempt($credentials)) {
            return redirect()->route('users.dashboard');
        }
        // if (auth()->attempt($credentials)) {
            // return redirect()->route('users.dashboard');
        // }
        

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function showRegistrationForm()
    {
        return view('users.register');
    }

    public function register(Request $request)
    {
        // Validation and user creation logic here
        // After creating the user, you can log them in and redirect to dashboard
    }

    public function dashboard()
    {
        return view('users.dashboard');
    }
    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Retrieve all users from the database
        $users = User::all();
        // $this->authorize('isAdmin');
        // Pass the users to the 'users.index' view
        return view('users.index', compact('users'));
    }

    public function showInsertForm()
    {
        return view('users.create_user');
    }


    public function insertData(Request $request)
    {
        $data = [
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'designation' => $request->input('designation'),
            'password' => bcrypt($request->input('password')), // Encrypt password
            'business_email' => $request->input('business_email'),
            'business_email' => $request->input('business_email'),
        ];

        User::create($data);

        return redirect()->back()->with('success', 'User data inserted successfully.');
    }

    
    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Display the 'users.create' view (form for creating a new user)
        return view('users.create');
    }

    /**
     * Store a newly created user in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the input data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        // Create a new user in the database
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        // Redirect back to the index route with a success message
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        // Find the user with the given ID
        $user = User::findOrFail($id);

        // Display the 'users.edit' view (form for editing the user)
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified user in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        // Validate the input data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($id),
            ],
        ]);

        // Find the user with the given ID
        $user = User::findOrFail($id);

        // Update the user's name and email in the database
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        // Redirect back to the index route with a success message
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified user from the database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // Find the user with the given ID
        $user = User::findOrFail($id);

        // Delete the user from the database
        $user->delete();

        // Redirect back to the index route with a success message
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
