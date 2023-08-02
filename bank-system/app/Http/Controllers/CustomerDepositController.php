<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class CustomerDepositController extends Controller
{
    public function showDepositForm(){
        // Ensure that the customer is authenticated
        if (!Auth::check() || Auth::user()->role !== 'customer') {
            return redirect('/login');
    }

    return view('customer.deposit');
}

    public function depositFunds(Request $request) {

    // Ensure that the customer is authenticated
    if (!Auth::check() || Auth::user()->role !== 'customer') {
        return redirect('/login');
    }

    // Obtain the amount and narrative from the form
    $amount = $request->input('amount');
    $narrative = $request->input('narrative');

    // Generate a UUID4 to be used as the reference
    $reference = \Ramsey\Uuid\Uuid::uuid4()->toString();

    $message = "Your transaction has been accepted for processing. Please complete by approving it on your phone.";

        return view('customer.deposit_confirmation', compact('message'));

   }

}

    

