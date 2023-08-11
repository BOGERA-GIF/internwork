@extends('layouts.customer_app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-xs">
        <div class="register-form">
            <h2 class="text-2xl text-center font-bold mb-4">Customer Registration</h2>
            <form method="POST" action="{{ route('customers.register') }}">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="business_name">
                        Account_number
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="account_number"
                        type="number"
                        name="account_number"
                        required
                    >
                </div>
                <!-- <form method="POST" action="{{ route('customers.register') }}">
        @csrf
        <label for="business_name">Business Name:</label>
        <input type="text" id="business_name" name="business_name" required>
        
        <label for="account_number">Account Number:</label>
        <input type="text" id="account_number" name="account_number" required>
        
        <label for="contact_person_name">Contact Person Name:</label>
        <input type="text" id="contact_person_name" name="contact_person_name" required>
        
        <label for="contact_person_phone">Contact Person Phone:</label>
        <input type="text" id="contact_person_phone" name="contact_person_phone" required>
        
        <label for="business_phone">Business Phone:</label>
        <input type="text" id="business_phone" name="business_phone" required>
        
        <label for="business_email">Business Email:</label>
        <input type="email" id="business_email" name="business_email" required>
        
        <label for="pin">PIN:</label>
        <input type="password" id="pin" name="pin" required>

        <label for="available_balance">available_balance:</label>
        <input type="number" id="available_balance" name="available_balance" required>

        <label for="actual_balance">actual_balance:</label>
        <input type="number" id="actual_balance" name="actual_balance" required>
        
        
         -->
         <div class="flex items-center justify-center">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit"
                    >
                        Register
                    </button>
                </div>
        @endsection

        <!-- <button type="submit">register</button> -->
    <!-- </form>

        </div> -->
    <!-- </div>
</div> -->



                <!-- Include other registration fields here -->

                <!-- <div class="flex items-center justify-center">
                    <button
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit"
                    >
                        Register
                    </button>
                 </div>
            </form>
        </div>
    </div>
</div>

