<!-- <h1>Transaction Successful</h1>  -->

 
 
 
 
 

@extends('layouts.customer_app') 

 @section('content') 
<div class="container">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <!-- <h2>Withdrawal Status</h2> -->
    <p>Your withdrawal request has been processed successfully.</p>
    
    

    <h2>Withdrawal Details</h2>

    @foreach ($withdrawals as $withdrawal)
    <div class="card mb-3">
        <div class="card-header">
            Withdrawal Transaction ID: {{ $withdrawal->id }}
        </div>
        <div class="card-body">
            <p>Withdrawal Amount: ${{ $withdrawal->amount }}</p>
            <p>Narrative: {{ $withdrawal->narrative }}</p>
            <p>Type: {{ $withdrawal->type }}</p>
            <p>Payment Gateway Reference: {{ $withdrawal->payment_gateway_reference }}</p>
            <p>Transaction Date: {{ $withdrawal->created_at }}</p>
        </div>
    </div>
    @endforeach

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

                