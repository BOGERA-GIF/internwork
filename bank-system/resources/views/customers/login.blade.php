<!-- 
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-xs">
        <div class="login-form">
            <h2 class="text-2xl text-center font-bold mb-4">Customer Login</h2>
            <form method="POST" action="{{ route('customers.login.submit') }}">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="account_number">
                        Account Number
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="account_number"
                        type="number"
                        name="account_number"
                        inputmode="none"
                        required
                        style="-moz-appearance: textfield; /* Firefox */"
                    >
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="pin">
                        PIN
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                        id="pin"
                        type="password"
                        name="pin"
                        required
                    >
                </div>

                <div class="flex items-center justify-center">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit"
                    >
                        Log In
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
 -->

 <div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-xs">
        <div class="login-form">
            <h2 class="text-2xl text-center font-bold mb-4">Customer Login</h2>
            <form method="POST" action="{{ route('customers.login.submit') }}">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="account_number">
                        Account_number
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="account_number"
                        type="number"
                        name="account_number"
                        required
                    >
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="pin">
                        Password
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                        id="pin"
                        type="password"
                        name="pin"
                        required
                    >
                </div>

                <div class="flex items-center justify-center">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit"
                    >
                        Log In
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@if(session('error'))
    {{ session('error') }}
@endif