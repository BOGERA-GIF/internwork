<!DOCTYPE html>
<html>
<head>
    <title>Banking System Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <label for="username">Username (Account Number):</label>
        <input type="text" id="username" name="username" required>

        <label for="password">PIN:</label>
        <input type="password" id="password" name="password" required>

        <label for="role">Role:</label>
        <select id="role" name="role" required>
            <option value="admin">Admin</option>
            <option value="customer">Customer</option>
        </select>

        <button type="submit">Login</button>
    </form>
</body>
</html>
