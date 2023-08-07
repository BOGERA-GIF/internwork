
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-xs">
        <div class="register-form">
            <h2 class="text-2xl text-center font-bold mb-4">Customer Registration</h2>
            <form method="POST" action="{{ route('customers.register') }}">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="business_name">
                        Business Name
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="business_name"
                        type="text"
                        name="business_name"
                        required
                    >
                </div>

                <!-- Include other registration fields here -->

                <div class="flex items-center justify-center">
                    <button
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit"
                    >
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

