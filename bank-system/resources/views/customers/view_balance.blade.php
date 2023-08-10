 @extends('layouts.customer_app') 

 @section('content') 
<div class="flex justify-center">
    <div class="w-full max-w-md">
        <div class="p-6">
            <h2 class="text-2xl font-semibold mb-4">View Balance</h2>
            <p> Welcome {{ $customer->name }}</p>
             <p>Actual Balance: {{ $customer->actual_balance }}</p> 
             <p>Available Balance: {{ $customer->available_balance }}</p> 
        </div>
    </div>
</div>
 @endsection 
