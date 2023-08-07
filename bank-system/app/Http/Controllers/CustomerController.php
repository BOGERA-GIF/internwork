<?php

// app/Http/Controllers/CustomerController.php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Session;


class CustomerController extends Controller
{
    /**
     * Display a listing of the customers.
     *
     * @return \Illuminate\View\View
     */
    
    public function showLoginForm()
    {
    return view('customers.login');
    }
    // login
//     public function login(Request $request)
// {
//     $credentials = $request->only('account_number', 'pin');

//     if (Auth::guard('customers')->attempt($credentials)) {
//         return redirect()->route('customer.dashboard');
//     } else {
//         return back()->withErrors(['account_number' => 'Invalid credentials']);
//     }
// }


















// Handle Customer Login
    public function login(Request $request)
     {
    // try {
        // $credentials = $request->only('account_number', 'pin');
        // $credentials['pin'] = bcrypt($credentials['pin']);

        // if (Auth::guard('customers')->attempt($credentials)) {
            // return redirect()->route('customer.dashboard');
        // } else {
            // return redirect()->back()->withInput()->withErrors(['login' => 'Login failed.']);
        // }
        $credentials = $request->validate([
            'account_number' => 'required',
            'pin' => 'required',
        ]);
        $customer = Customer::where('account_number', $credentials['account_number'])->first();
        // echo "<pre>";print_r($customer->pin);echo "</pre>";

        if ($customer && (Hash::check($credentials['pin'], $customer->pin))) {
            //try {
                Auth::guard('customers')->login($customer);
                return view('customers.dashboard', ['customer' => $customer]);
            //} catch (Exception $e) {
            //    echo $e->getMessage();
            //   return;            
            //}
        } else {
            return redirect()->back()->with('error', 'Login failed.');
        }
    
}

// Show Customer Registration Form
public function showRegistrationForm()
{
    return view('customers.register');
}

// Handle Customer Registration
public function register(Request $request)
{
    // Validate and create customer

    Auth::guard('customers')->login($customer);
    return view('customers.register', ['customer' => $customer]);
    // return redirect()->route('customer.dashboard');
}


// public function logout()
// {
    // Auth::guard('customers')->logout();
    // return redirect('/');
// }
public function logout(Request $request)
{
    Auth::guard('customers')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('customers.login'); // Redirect to customer login after logout
}

    public function dashboard()
    {
        return view('customers.dashboard');
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
        return view('customers.create_customer');
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
            'pin' => bcrypt($request->input('pin')),
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
            'pin' => bcrypt($request->input('pin')),
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
       // Customer Viewing Balance
    public function viewBalance()
{
    // Ensure the customer is authenticated
    if (!Auth::guard('customers')->check()) {
        return redirect()->route('customer.login');
    }

    // Query the customers table for the customer's balances
    $customer = Auth::guard('customers')->user();
    $actualBalance = $customer->actual_balance;
    $availableBalance = $customer->available_balance;

    // Display the balances in a view
    return view('customer.view_balance', compact('actualBalance', 'availableBalance'));
}

public function depositForm()
{
    // Ensure the customer is authenticated
    if (!Auth::guard('customers')->check()) {
        return redirect()->route('customer.login');
    }

    return view('customer.deposit_form');
}

public function processDeposit(Request $request)
{
    // Ensure the customer is authenticated
    if (!Auth::guard('customers')->check()) {
        return redirect()->route('customer.login');
    }

    // Validate the deposit form data
    $request->validate([
        'amount' => 'required|numeric|min:0.01',
        'narrative' => 'required|string|max:255',
    ]);

    // Obtain the amount and narrative
    $amount = $request->input('amount');
    $narrative = $request->input('narrative');

    // Generate a UUID4 reference
    $reference = Str::uuid()->toString();

    // Create a new entry in the transactions_log table

    // Construct Yo! Payments XML and make API call

    // Update transaction status and display message

    // Return the display message to the user

    // Redirect back or to a success page
}
    

public function accountStatementForm()
{
    // Ensure the customer is authenticated
    if (!Auth::guard('customers')->check()) {
        return redirect()->route('customer.login');
    }

    return view('customer.account_statement_form');
}

public function processAccountStatement(Request $request)
{
    // Ensure the customer is authenticated
    if (!Auth::guard('customers')->check()) {
        return redirect()->route('customer.login');
    }

    // Validate the account statement form data
    $request->validate([
        'start_date' => 'required|date',
        'end_date' => 'required|date|after:start_date',
    ]);

    // Obtain the start and end dates
    $startDate = $request->input('start_date');
    $endDate = $request->input('end_date');

    // Query the customer_transactions table for the statement using the provided date range

    // Display the statement in a view

    // Redirect back or to a success page
}


}
