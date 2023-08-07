<!-- @extends('layouts.app') -->

<!-- @section('content') -->
    <h1>Edit Customer</h1>
    <form action="{{ route('customers.update', $customer->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="account_number">account_number</label>
        <input type="number" name="account_number" id="account_number" value="{{ $customer->account_number }}" required>
        
        <label for="pin">PIN:</label>
        <input type="password" name="pin" id="pin" required>
        
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ $customer->email }}" required>
        
        <button type="submit">Save Changes</button>
    </form>
<!-- @endsection -->
