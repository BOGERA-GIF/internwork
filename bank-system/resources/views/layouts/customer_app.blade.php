<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini-Core Banking System</title>
    <!-- Include your CSS and JavaScript links here -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
    <!-- Link to your jQuery and EasyUI CSS files -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jquery-easyui@1.10.1/themes/bootstrap/easyui.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jquery-easyui@1.10.1/themes/icon.css">

    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include EasyUI library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-easyui@1.10.1/jquery.easyui.min.js"></script>

    <!-- Include your custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <!-- Include your custom JavaScript -->
    <script src="{{ asset('js/custom.js') }}"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-600 p-4 text-white">
        <div class="container mx-auto flex justify-between">
            <a href="{{ route('customers.dashboard') }}" class="font-semibold text-lg">BankHub</a>
            <ul class="flex space-x-4">
                <!-- <li><a href="{{ route('customers.dashboard') }}">Dashboard</a></li> -->
                <!-- <li><a href="{{ route('customers.view_balance') }}">View Balance</a></li> -->
                <!-- <li><a href="{{ route('customers.show_depositForm') }}">Deposit</a></li> -->
                <!-- <li><a href="{{ route('customers.show_withdraw_form') }}">Withdraw</a></li> -->
                <!-- <li><a href="{{ route('customers.account_statement') }}">Account Statement</a></li> -->
            </ul>
        </div>
    </nav>

    <div class="bg-gray-200 container mx-auto mt-8 p-4 rounded-lg  max-w-4xl">
        @yield('content')
    </div>

    <!-- Include your scripts here -->
</body>
</html>
