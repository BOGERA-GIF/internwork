<!-- <h1>Transaction Successful</h1>  -->

 
 
 
 
 

@extends('layouts.customer_app') 

 @section('content') 
<div class="container">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <h2>Withdrawal Status</h2>
    <p>Your withdrawal request has been processed successfully.</p>
    </div> 









    
    <div>
    <form method="POST" action="{{ route('customers.show_withdraw_form') }}">
        @csrf <!-- Include the CSRF token -->
        
        <label for="amount">Amount:</label>
        <input type="number" name="amount" id="amount" required>
        
        <!-- Add more form fields as needed -->
        
        <button type="submit">Submit Withdrawal</button>
    </form>
    
</div>
@endsection  

                