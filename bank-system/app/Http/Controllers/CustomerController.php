<?php

// app/Http/Controllers/CustomerController.php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class CustomerController extends Controller
{
    /**
     * Display a listing of the customers.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
    return view('auth.customer-login');
    }

    public function login(Request $request)
    {
    $credentials = [
        'account_number' => $request->input('account_number'),
        'pin' => $request->input('pin'),
    ];

    if (Auth::attempt($credentials)) {
        // Authentication passed...
        return redirect()->route('customers.index')->with('success', 'Logged in successfully.');
    } else {

    // Authentication failed...
    return back()->withInput()->withErrors(['login' => 'Invalid account number or PIN.']);
    }
    }







    public function index()
    {
        // Retrieve all customers from the database
        $customers = Customer::all();

        // Pass the customers to the 'customers.index' view
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        $customer = new Customer();
        // Create a new instance of the Customer model
    // You can set default values for the $customer instance if needed
    // For example: $customer->email = '';


        return view('customers.create');
    }


    public function showInsertForm()
    {
        return view('customer.create_customer');
    }


    public function insertData(Request $request)
    {
        $data = [
            'business_name' => $request->input('business_name'),
            'account_number' => $request->input('account_number'),
            'contact_person_name' => $request->input('contact_person_name'),
            'contact_person_phone' => $request->input('contact_person_phone'),
            'business_phone' => $request->input('business_phone'),
            'business_email' => $request->input('business_email'),
            'pin' => $request->input('pin'),
            'available_balance'=>$request->input('available_balance'),
            'actual_balance'=>$request->input('actual_balance'),
            // ... other customer attributes
        ];

        Customer::create($data);

        return redirect()->back()->with('success', 'Customer data inserted successfully.');
    }

    /**
     * Show the form for creating a new customer.
     *
     * @return \Illuminate\View\View
     */
    // // public function create()
    // {
    //     // Display the 'customers.create' view (form for creating a new customer)
    //     return view('customers.create');
    // }

    /**
     * Store a newly created customer in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the input data
        $request->validate([
            'name' => 'required|string|max:255',
            'account_number' => 'required|unique:customers,account_number',
            'phone' => 'required|string|max:20',
            'pin' => 'required|string|min:6',
        ]);

        // Create a new customer in the database
        Customer::create([
            'name' => $request->input('name'),
            'account_number' => $request->input('account_number'),
            'phone' => $request->input('phone'),
            'pin' => Hash::make($request->input('pin')), // Hash the 'pin' before storing it
            'created_on' => now(),
            'available_balance' => 0,
            'actual_balance' => 0,
        ]);

        // Redirect back to the index route with a success message
        return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
    }

    /**
     * Show the form for editing the specified customer.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        // Find the customer with the given ID
        $customer = Customer::findOrFail($id);

        // Display the 'customers.edit' view (form for editing the customer)
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified customer in the database.
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
            'account_number' => [
                'required',
                Rule::unique('customers')->ignore($id),
            ],
            'phone' => 'required|string|max:20',
        ]);

        // Find the customer with the given ID
        $customer = Customer::findOrFail($id);

        // Update the customer's name, account number, and phone in the database
        $customer->update([
            'name' => $request->input('name'),
            'account_number' => $request->input('account_number'),
            'phone' => $request->input('phone'),
        ]);

        // Redirect back to the index route with a success message
        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }

    /**
     * Remove the specified customer from the database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // Find the customer with the given ID
        $customer = Customer::findOrFail($id);

        // Delete the customer from the database
        $customer->delete();

        // Redirect back to the index route with a success message
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }
}
