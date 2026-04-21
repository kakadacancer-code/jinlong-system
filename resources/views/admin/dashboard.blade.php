<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Jinlong System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen">

    {{-- Navbar --}}
    <nav class="bg-indigo-600 text-white px-6 py-4 flex justify-between items-center">
        <h1 class="text-xl font-bold">🏠 Jinlong Admin</h1>
        <form method="POST" action="/logout">
            @csrf
            <button type="submit" class="bg-white text-indigo-600 px-4 py-1 rounded-lg font-medium hover:bg-gray-100 transition">
                Logout
            </button>
        </form>
    </nav>

    {{-- Content --}}
    <div class="p-6">
        <h2 class="text-2xl font-bold text-gray-700 mb-6">Welcome, {{ Auth::user()->name }}! 👋</h2>

        {{-- Stats Cards --}}
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
            <div class="bg-white rounded-2xl shadow p-6 text-center">
                <h3 class="text-4xl font-bold text-indigo-600">{{ $data['properties'] }}</h3>
                <p class="text-gray-500 mt-2 text-sm">Properties</p>
            </div>
            <div class="bg-white rounded-2xl shadow p-6 text-center">
                <h3 class="text-4xl font-bold text-indigo-600">{{ $data['units'] }}</h3>
                <p class="text-gray-500 mt-2 text-sm">Units</p>
            </div>
            <div class="bg-white rounded-2xl shadow p-6 text-center">
                <h3 class="text-4xl font-bold text-indigo-600">{{ $data['tenants'] }}</h3>
                <p class="text-gray-500 mt-2 text-sm">Tenants</p>
            </div>
            <div class="bg-white rounded-2xl shadow p-6 text-center">
                <h3 class="text-4xl font-bold text-indigo-600">{{ $data['leases'] }}</h3>
                <p class="text-gray-500 mt-2 text-sm">Leases</p>
            </div>
            <div class="bg-white rounded-2xl shadow p-6 text-center">
                <h3 class="text-4xl font-bold text-indigo-600">{{ $data['payments'] }}</h3>
                <p class="text-gray-500 mt-2 text-sm">Payments</p>
            </div>
            <div class="bg-white rounded-2xl shadow p-6 text-center">
                <h3 class="text-4xl font-bold text-indigo-600">{{ $data['maintenanceRequests'] }}</h3>
                <p class="text-gray-500 mt-2 text-sm">Maintenance</p>
            </div>
        </div>
    </div>

</body>
</html>