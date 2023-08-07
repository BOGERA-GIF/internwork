<!-- @extends('layouts.app') -->

<!-- @section('content') -->
    <h1>Create New Customer</h1>
    <form action="{{ route('customers.store') }}" method="POST">
        @csrf
        <label for="account_number">Account Number:</label>
        <input type="number" name="account_number" id="account_number" required>
        
        <label for="pin">PIN:</label>
        <input type="password" name="pin" id="pin" required>
        
        
        
        
        <button type="submit">Create Customer</button>
    </form>
<!-- @endsection -->


