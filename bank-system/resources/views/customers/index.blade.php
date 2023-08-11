<!-- @extends('layouts.app') -->

<!-- @section('content') -->
    <h1>Customer Management</h1>
    <a href="{{ route('customers.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-0 px-0 rounded focus:outline-none focus:shadow-outline">Add New Customer</a>

    @if(count($customers) > 0)
        <table>
            <thead>
                <tr>
                    <th>account_number</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                    <tr>
                        <td>{{ $customer->account_number }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>
                            <a href="{{ route('customers.edit', $customer->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-0 px-1 rounded focus:outline-none focus:shadow-outline">Edit</a>
                            <form action="{{ route('customers.destroy', $customer->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a  href="#" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this user?')) { this.closest('form').submit(); }"class="bg-red-500 hover:bg-red-700 text-white font-bold py-0 px-0 rounded focus:outline-none focus:shadow-outline"> <button type="submit">Delete</button></a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No customers found.</p>
    @endif
<!-- @endsection -->
