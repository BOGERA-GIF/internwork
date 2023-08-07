<!DOCTYPE html>
<html>
<head>
    <title>Create Customer</title>
</head>
<body>
    <h2>Create Customer</h2>
    
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif
    
    <form method="POST" action="{{ route('insert-customer') }}">
        @csrf
        <label for="business_name">Business Name:</label>
        <input type="text" id="business_name" name="business_name" required>
        
        <label for="account_number">Account Number:</label>
        <input type="text" id="account_number" name="account_number" required>
        
        <label for="contact_person_name">Contact Person Name:</label>
        <input type="text" id="contact_person_name" name="contact_person_name" required>
        
        <label for="contact_person_phone">Contact Person Phone:</label>
        <input type="text" id="contact_person_phone" name="contact_person_phone" required>
        
        <label for="business_phone">Business Phone:</label>
        <input type="text" id="business_phone" name="business_phone" required>
        
        <label for="business_email">Business Email:</label>
        <input type="email" id="business_email" name="business_email" required>
        
        <label for="pin">PIN:</label>
        <input type="password" id="pin" name="pin" required>

        <label for="available_balance">available_balance:</label>
        <input type="number" id="available_balance" name="available_balance" required>

        <label for="actual_balance">actual_balance:</label>
        <input type="number" id="actual_balance" name="actual_balance" required>
        
        
        
        

        <button type="submit">Create Customer</button>
    </form>
</body>
</html>
