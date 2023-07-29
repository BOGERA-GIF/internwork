<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mini-Core Banking System</title>
    <!-- Add your CSS files here -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <header>
        <div class="container">
            <h1>Mini-Core Banking System</h1>
            <nav>
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('users.index') }}">Users</a></li>
                    <li><a href="{{ route('customers.index') }}">Customers</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>

    <footer>
        <div class="container">
            <p>&copy; <?php echo date("Y"); ?> Mini-Core Banking System. All rights reserved.</p>
        </div>
    </footer>
    
    <!-- Add your JavaScript files here -->
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>
