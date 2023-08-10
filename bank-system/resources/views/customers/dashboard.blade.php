 
 
 
 
 
 
 
 <div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md">
        <div class="dashboard">
            <h2 class="text-2xl text-center font-bold mb-4">Customer Dashboard</h2>
            <div class="border rounded-lg p-4 bg-white shadow-md">
                <p class="mb-2"><strong>Welcome, {{ $customer->business_name }}!</strong></p>
                <p>Your Account Number: {{ $customer->account_number }}</p>
                <p>Contact Person: {{ $customer->contact_person_name }}</p>
                <!-- Display other customer information here --> 

                <!-- <div class="mt-4"> 
                     <a href="{{ route('customers.logout') }}"
                       class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        
                    </a>
                    <form action="{{ route('customers.logout') }}" method="POST">
    @csrf
    <button type="submit">Logout</button>
</form>

                </div> -->
            </div>
        </div>
    </div>
</div> 

    <h1>Welcome, Customer!</h1>
    
    <h2>Functionalities:</h2>
    <ul>
        <li><a href="/customer/view_balance">View Balance</a></li>
        <li><a href="/customer/deposit">Deposit Funds</a></li>
        <li><a href="/customer/withdraw">Withdraw Funds</a></li>
        <li><a href="{{ route('customers.account_statement') }}">View Account Statement</a></li>
    </ul>
</body>
</html> 

<div class="mt-4"> 
                     <a href="{{ route('customers.logout') }}"
                       class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        
                    </a>
                    <form action="{{ route('customers.logout') }}" method="POST">
    @csrf
    <button type="submit">Logout</button>
</form>

                </div>

 
