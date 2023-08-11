@extends('layouts.app')

@section('content')
    <h1>User Management</h1>
    <a href="{{ route('users.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-0 px-0 rounded focus:outline-none focus:shadow-outline">Add New User</a>

    @if(count($users) > 0)
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-0 px-1 rounded focus:outline-none focus:shadow-outline">Edit</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                               <a  href="#" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this user?')) { this.closest('form').submit(); }"class="bg-red-500 hover:bg-red-700 text-white font-bold py-0 px-0 rounded focus:outline-none focus:shadow-outline"> <button type="submit" >Delete</button></a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No users found.</p>
    @endif
@endsection
