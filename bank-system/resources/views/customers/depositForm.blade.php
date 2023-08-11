@extends('layouts.customer_app')

@section('content')
<div class="flex justify-center">
    <div class="w-full max-w-md">
        <div class="p-6">
            <h2 class="text-2xl font-semibold mb-4">Deposit Funds</h2>
            <form method="POST" action="{{ route('customers.process_deposit') }}">
                @csrf
                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700">Amount</label>
                    <input type="number" name="amount" class="form-input w-full">
                </div>
                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700">Narrative</label>
                    <input type="text" name="narrative" class="form-input w-full">
                </div>
                <div class="mb-4">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
