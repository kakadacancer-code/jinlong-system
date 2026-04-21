<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - Jinlong System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen">

    {{-- Navbar --}}
    <nav class="bg-red-600 text-white px-6 py-4 flex justify-between items-center">
        <h1 class="text-xl font-bold">🏠 Jinlong System</h1>
        <form method="POST" action="/logout">
            @csrf
            <button type="submit" class="bg-white text-emerald-600 px-4 py-1 rounded-lg font-medium hover:bg-gray-100 transition">
                Logout
            </button>
        </form>
    </nav>

    {{-- Content --}}
    <div class="p-6">
        <div class="bg-white rounded-2xl shadow p-6">
            <h2 class="text-2xl font-bold text-gray-700">Welcome, {{ Auth::user()->name }}! 👋</h2>
            <p class="text-gray-500 mt-2">You are logged in as a regular user.</p>
        </div>
    </div>

</body>
</html>