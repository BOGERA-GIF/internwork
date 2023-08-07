 
 
 
 
 
 
 
 <div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md">
        <div class="dashboard">
            <h2 class="text-2xl text-center font-bold mb-4">Customer Dashboard</h2>
            <div class="border rounded-lg p-4 bg-white shadow-md">
                <p class="mb-2"><strong>Welcome, {{ $customer->business_name }}!</strong></p>
                <p>Your Account Number: {{ $customer->account_number }}</p>
                <p>Contact Person: {{ $customer->contact_person_name }}</p>
                <!-- Display other customer information here --> 

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
            </div>
        </div>
    </div>
</div> 

    <!-- <h1>Welcome, Customer!</h1>
    
    <h2>Customer Functionalities:</h2>
    <ul>
        <li><a href="/customer/balance">View Balance</a></li>
        <li><a href="/customer/deposit">Deposit Funds</a></li>
        <li><a href="/customer/withdraw">Withdraw Funds</a></li>
        <li><a href="/customer/statement">Transactions</a></li>
    </ul>
</body>
</html> -->

 <!-- <div class="flex justify-center">
    <div class="w-full max-w-3xl">
        <div class="p-6">
            <h2 class="text-2xl font-semibold mb-4">Admin Dashboard</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                 <a href="{{ route('users.index') }}"
                   class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-4 px-6 rounded shadow-md transition duration-300">
                    Manage Users
                </a> 

                 <a href="{{ route('customers.index') }}"
                   class="bg-green-500 hover:bg-green-700 text-white font-bold py-4 px-6 rounded shadow-md transition duration-300">
                    Manage Customers
                </a>
            </div>
        </div> 
     </div>
</div> -->
