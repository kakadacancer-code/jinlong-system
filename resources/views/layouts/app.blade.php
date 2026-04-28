<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jinglong-system – @yield('title', 'Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600&family=DM+Serif+Display&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans:    ['DM Sans', 'sans-serif'],
                        display: ['DM Serif Display', 'serif'],
                    },
                    colors: {
                        brand: {
                            50:  '#ede9fe',
                            100: '#ddd6fe',
                            500: '#8b5cf6',
                            600: '#7c3aed',
                            700: '#6d28d9',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'DM Sans', sans-serif; }
    </style>
    @stack('styles')
</head>
<body class="bg-gray-50 text-gray-800 flex min-h-screen">

{{-- ── Sidebar ─────────────────────────────────── --}}
<aside class="w-64 min-h-screen bg-white border-r border-gray-200 flex flex-col fixed top-0 left-0 bottom-0 z-50">

    {{-- Brand --}}
    <div class="px-5 py-6 border-b border-gray-100">
        <div class="flex items-center gap-3">
            <!-- <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-violet-600 to-violet-400 flex items-center justify-center text-white text-lg font-bold">
                J
            </div> -->
            <div>
                <h2 class="font-bold text-base leading-tight">Jinglong System</h2>
                <span class="text-xs text-gray-400">Phnom Penh • Cambodia</span>
            </div>
        </div>
    </div>

    {{-- Nav --}}
    <nav class="flex-1 px-3 py-4 flex flex-col gap-0.5">
        <span class="text-[10px] font-semibold tracking-widest uppercase text-gray-400 px-2 pb-1 pt-2">Menu</span>

        {{-- Dashboard --}}
        <a href="{{ route('dashboard') }}"
        class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-sm font-medium transition-all
                {{ request()->routeIs('dashboard') ? 'bg-violet-50 text-violet-600 font-semibold' : 'text-gray-500 hover:bg-gray-100 hover:text-gray-800' }}">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/>
                <rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/>
            </svg>
            Dashboard
        </a>

        {{-- Properties --}}
        <a href="{{ route('properties.index') }}"
        class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-sm font-medium transition-all
                {{ request()->routeIs('properties.*') ? 'bg-violet-50 text-violet-600 font-semibold' : 'text-gray-500 hover:bg-gray-100 hover:text-gray-800' }}">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
                <polyline points="9 22 9 12 15 12 15 22"/>
            </svg>
            Properties
        </a>

        {{-- Tenants --}}
       <a href="{{ route('tenants.index') }}"
        class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-sm font-medium transition-all
                {{ request()->routeIs('tenants.*') ? 'bg-violet-50 text-violet-600 font-semibold' : 'text-gray-500 hover:bg-gray-100 hover:text-gray-800' }}">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/>
                <circle cx="9" cy="7" r="4"/>
            </svg>
            Tenants
        </a>

        {{-- Payments --}}
        <a href="{{ route('payments') }}"
        class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-sm font-medium transition-all
                {{ request()->routeIs('payments') ? 'bg-violet-50 text-violet-600 font-semibold' : 'text-gray-500 hover:bg-gray-100 hover:text-gray-800' }}">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <rect x="1" y="4" width="22" height="16" rx="2"/>
                <line x1="1" y1="10" x2="23" y2="10"/>
            </svg>
            Payments
        </a>

        {{-- Maintenance --}}
        <a href="{{ route('maintenance') }}"
        class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-sm font-medium transition-all
                {{ request()->routeIs('maintenance') ? 'bg-violet-50 text-violet-600 font-semibold' : 'text-gray-500 hover:bg-gray-100 hover:text-gray-800' }}">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="3"/>
                <path d="M19.07 4.93a10 10 0 010 14.14M4.93 4.93a10 10 0 000 14.14"/>
            </svg>
            Maintenance
        </a>

        {{-- Leases --}}
        <a href="{{ route('leases') }}"
        class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-sm font-medium transition-all
                {{ request()->routeIs('leases') ? 'bg-violet-50 text-violet-600 font-semibold' : 'text-gray-500 hover:bg-gray-100 hover:text-gray-800' }}">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/>
                <polyline points="14 2 14 8 20 8"/>
            </svg>
            Leases
        </a>

        {{-- Reports --}}
        <a href="{{ route('reports') }}"
        class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-sm font-medium transition-all
                {{ request()->routeIs('reports') ? 'bg-violet-50 text-violet-600 font-semibold' : 'text-gray-500 hover:bg-gray-100 hover:text-gray-800' }}">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <line x1="18" y1="20" x2="18" y2="10"/>
                <line x1="12" y1="20" x2="12" y2="4"/>
                <line x1="6" y1="20" x2="6" y2="14"/>
            </svg>
            Reports
        </a>
    </nav>

    {{-- Logout --}}
    <div class="px-3 py-4 border-t border-gray-100">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                    class="w-full flex items-center gap-2.5 px-3 py-2 rounded-lg text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-800 transition-all">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" class="opacity-60">
                    <path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4"/>
                    <polyline points="16 17 21 12 16 7"/>
                    <line x1="21" y1="12" x2="9" y2="12"/>
                </svg>
                Logout
            </button>
        </form>
    </div>
</aside>

{{-- ── Main ────────────────────────────────────── --}}
<div class="ml-64 flex-1 flex flex-col min-h-screen">

    {{-- Topbar --}}
    <header class="bg-white border-b border-gray-200 px-8 h-16 flex items-center justify-between sticky top-0 z-40">
        <span class="text-lg font-semibold text-gray-800">@yield('title', 'Dashboard')</span>
        <div class="flex items-center gap-3">
            <div class="text-right leading-tight">
                <strong class="block text-sm font-semibold">{{ auth()->user()->name ?? 'Kakada' }}</strong>
                <span class="text-xs text-gray-400">Phnom Penh</span>
            </div>
            <div class="w-9 h-9 rounded-full bg-gradient-to-br from-violet-600 to-violet-400 flex items-center justify-center text-white font-semibold text-sm">
                {{ strtoupper(substr(auth()->user()->name ?? 'K', 0, 1)) }}
            </div>
        </div>
    </header>

    {{-- Flash messages --}}
    <div class="px-8 pt-5">
        @if(session('success'))
            <div class="mb-4 px-4 py-3 rounded-lg bg-green-50 text-green-700 text-sm border border-green-200">
                ✓ {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="mb-4 px-4 py-3 rounded-lg bg-red-50 text-red-700 text-sm border border-red-200">
                ✕ {{ session('error') }}
            </div>
        @endif
    </div>

    {{-- Page content --}}
    <main class="px-8 pb-10 pt-6 flex-1">
        @yield('content')
    </main>

</div>

<script>
    lucide.createIcons();
    function showToast(msg) { alert(msg); }
</script>

@stack('scripts')
</body>
</html>