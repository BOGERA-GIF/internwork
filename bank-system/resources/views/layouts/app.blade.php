<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mini-Core Banking System</title>
    <!-- Add your CSS files here -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <!-- Add EasyUI CSS -->
    <link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/themes/icon.css">
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
        <div class="easyui-layout" style="width: 100%; height: 100vh;">
            <div data-options="region:'west',split:true" title="Menu" style="width: 200px;">
                <ul class="easyui-tree">
                    <li data-options="state:'closed'">
                        <span>Customers</span>
                        <ul>
                            <li><a href="{{ route('customers.create') }}">Create Customer</a></li>
                            <li><a href="{{ route('customers.index') }}">View Customers</a></li>
                        </ul>
                    </li>
                    <li data-options="state:'closed'">
                        <span>Users</span>
                        <ul>
                        <li><a href="{{ route('users.create') }}">Create User</a></li>
                            <li><a href="{{ route('users.index') }}">View Users</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div data-options="region:'center'">
                <div class="container">
                    @yield('content')
                </div>
            </div>
        </div>
    </main>

    <footer>
        <div class="container">
            <p>&copy; <?php echo date("Y"); ?> Mini-Core Banking System. All rights reserved.</p>
        </div>
    </footer>
    
    <!-- Add your JavaScript files here -->
    <script src="{{ asset('js/scripts.js') }}"></script>
    <!-- Add jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Add EasyUI -->
    <script type="text/javascript" src="https://www.jeasyui.com/easyui/jquery.easyui.min.js"></script>
</body>
</html>
