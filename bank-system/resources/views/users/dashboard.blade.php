
@extends('layouts.customer_app')

@section('content')
<div class="flex justify-center">
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
</div>
@endsection
