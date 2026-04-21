<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Jinlong System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded-2xl shadow-md w-full max-w-md">

        {{-- Logo / Title --}}
        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-red-600">🏠 Jinlong System</h1>
            <p class="text-gray-500 text-sm mt-1">Please login to continue</p>
        </div>

        {{-- Error Message --}}
        @if ($errors->any())
            <div class="bg-red-100 text-red-600 px-4 py-3 rounded-lg mb-4 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        {{-- Login Form --}}
        <form method="POST" action="/login">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Enter your email"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400"
                    required
                >
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input
                    type="password"
                    name="password"
                    placeholder="Enter your password"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400"
                    required
                >
            </div>

            <button
                type="submit"
                class="w-full bg-red-600 hover:bg-indigo-700 text-white font-semibold py-2 rounded-lg transition duration-200"
            >
                Login
            </button>
        </form>
    </div>

</body>
</html>