@extends('layouts.app')

@section('content')
    <h1>Edit Customer</h1>
    <form action="{{ route('customers.update', $customer->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ $customer->name }}" required>
        
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ $customer->email }}" required>
        
        <button type="submit">Save Changes</button>
    </form>
@endsection
