 
 
 
 
 

 @extends('layouts.customer_app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md">
        <div class="dashboard">
            <h2 class="text-2xl text-center font-bold mb-4">Customer Dashboard</h2>
            <div class="border rounded-lg p-4 bg-white shadow-md">
                <p class="mb-2"><strong>Welcome, {{ $customer->business_name }}!</strong></p>
                <p>Your Account Number: {{ $customer->account_number }}</p>
                <p>Contact Person: {{ $customer->contact_person_name }}</p>

                <h1>Welcome, Customer!</h1>

                <h2><strong>Functionalities:</strong></h2>
                <div class="bg-00b4d8 text-center py-4">
                    <ul class="flex flex-col space-y-2">
                        <li class="mb-2">
                            <a href="/customer/view_balance"
                               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-6 rounded focus:outline-none focus:shadow-outline">
                                View Balance
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="/customer/deposit"
                               class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-6 rounded focus:outline-none focus:shadow-outline">
                                Deposit Funds
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="/customer/withdraw"
                               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-6 rounded focus:outline-none focus:shadow-outline">
                                Withdraw Funds
                            </a>
                        </li>
                        <!-- <li class="mb-2">
                            <a href="{{ route('customers.account_statement') }}"
                               class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-6 rounded focus:outline-none focus:shadow-outline">
                                View Account Statement
                            </a>
                        </li> -->
                    </ul>
                </div>

                
            </div>
        </div>
    </div>
</div>
                <div class="mt-4">
                    <a href="{{ route('customers.logout') }}"
                       class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Logout
                    </a>
                    <form action="{{ route('customers.logout') }}" method="POST">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </div>
@endsection
