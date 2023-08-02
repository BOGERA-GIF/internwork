<!DOCTYPE html>
<html>
<head>
    <title>Create User</title>
</head>
<body>
    <h2>Create User</h2>
    
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif
    
    <form method="POST" action="{{ route('insert-user') }}">
        @csrf
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" required>
        
        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" required>
        
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" required>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        
        <label for="designation">Designation:</label>
        <input type="text" id="designation" name="designation" required>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <label for="business_email">Business_email:</label>
        <input type="email" id="business_email" name="business_email" required>
        
        
        <!-- Add other user attributes here -->

        <button type="submit">Create User</button>
    </form>
</body>
</html>
