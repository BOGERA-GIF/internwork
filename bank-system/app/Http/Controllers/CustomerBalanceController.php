<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class CustomerBalanceController extends Controller
{
    public function viewBalance() {
      // Ensure that the customer is authenticated
      if (!Auth::check() || Auth::user()->role !== 'customer') {
        return redirect('/login');  
    }

    // Get the authenticated customer user
    $customer = Auth::user();

    // Assuming you have the 'balance' field in the customers table
    $balance = $customer->balance;

    return view('customer.balance', compact('balance'));
  }
}
