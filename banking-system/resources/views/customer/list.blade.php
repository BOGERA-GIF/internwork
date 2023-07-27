<!-- resources/views/customer/list.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Customer List</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Account Number</th>
                    <th>Phone</th>
                    <th>Create Date</th>
                    <th>Available Balance</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->account_number }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td>{{ $customer->created_at }}</td>
                        <td>{{ $customer->available_balance }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
