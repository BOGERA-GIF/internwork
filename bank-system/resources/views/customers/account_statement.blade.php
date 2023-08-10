@extends('layouts.customer_app')

@section('content')
    <h2 class="text-2xl font-semibold mb-4">Account Statement</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Date</th>
                <th>Type</th>
                <th>Amount</th>
                <!-- Add more columns as needed -->
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->created_on }}</td>
                    <td>{{ $transaction->type }}</td>
                    <td>{{ $transaction->amount }}</td>
                    <!-- Add more columns as needed -->
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
