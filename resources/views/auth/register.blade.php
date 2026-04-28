<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register — Jinlong System</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Sora', sans-serif; }
    </style>
</head>

<body class="min-h-screen flex bg-slate-100">

    <!-- LEFT PANEL -->
    <div class="hidden lg:flex flex-1 relative bg-slate-900 overflow-hidden">

        <!-- grid -->
        <div class="absolute inset-0 opacity-20"
             style="background-image: linear-gradient(#ffffff10 1px, transparent 1px),
                                   linear-gradient(90deg, #ffffff10 1px, transparent 1px);
                    background-size: 48px 48px;">
        </div>

        <!-- glow -->
        <div class="absolute -top-24 -right-24 w-[400px] h-[400px] rounded-full bg-indigo-500/20 blur-3xl"></div>

        <div class="relative flex flex-col justify-between p-12 text-white">

            <!-- brand -->
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 flex items-center justify-center bg-white/10 rounded-lg">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" class="text-white">
                        <rect width="7" height="7" rx="2" fill="currentColor"/>
                        <rect x="11" width="7" height="7" rx="2" fill="currentColor" opacity=".6"/>
                        <rect y="11" width="7" height="7" rx="2" fill="currentColor" opacity=".6"/>
                        <rect x="11" y="11" width="7" height="7" rx="2" fill="currentColor" opacity=".3"/>
                    </svg>
                </div>
                <span class="font-semibold text-base">Jinlong System</span>
            </div>

            <!-- content -->
            <div>
                <h1 class="text-3xl font-bold leading-tight mb-4">
                    Create your account<br>and get started.
                </h1>
                <p class="text-slate-400 max-w-sm text-sm leading-relaxed">
                    Join our system to manage properties, tenants, and payments in one place.
                </p>
            </div>

            <!-- dots -->
            <div class="flex gap-2">
                <span class="w-2 h-2 rounded-full bg-white/30"></span>
                <span class="w-6 h-2 rounded-full bg-indigo-500"></span>
                <span class="w-2 h-2 rounded-full bg-white/20"></span>
            </div>
        </div>
    </div>

    <!-- RIGHT REGISTER -->
    <main class="flex w-full lg:w-[520px] items-center justify-center p-6 lg:p-12">

        <div class="w-full max-w-md">

            <!-- register card -->
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200">

                <h2 class="text-xl font-semibold text-slate-800 mb-6">
                    Create Account
                </h2>

                <form method="POST" action="{{ route('register') }}" class="space-y-4">
                    @csrf

                    <!-- Name -->
                    <div>
                        <label class="text-sm text-slate-600">Name</label>
                        <input type="text" name="name"
                               class="w-full mt-1 px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-indigo-500 outline-none"
                               required>
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="text-sm text-slate-600">Email</label>
                        <input type="email" name="email"
                               class="w-full mt-1 px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-indigo-500 outline-none"
                               required>
                    </div>

                    <!-- Password -->
                    <div>
                        <label class="text-sm text-slate-600">Password</label>
                        <input type="password" name="password"
                               class="w-full mt-1 px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-indigo-500 outline-none"
                               required>
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label class="text-sm text-slate-600">Confirm Password</label>
                        <input type="password" name="password_confirmation"
                               class="w-full mt-1 px-4 py-2 rounded-lg border border-slate-300 focus:ring-2 focus:ring-indigo-500 outline-none"
                               required>
                    </div>

                    <!-- Button -->
                    <button type="submit"
                            class="w-full bg-indigo-600 text-white py-2.5 rounded-lg font-medium hover:bg-indigo-700 transition">
                        Register
                    </button>
                </form>

            </div>

            <p class="text-center text-xs text-slate-500 mt-6">
                Already have an account?
                <a href="{{ route('login') }}" class="text-indigo-600 hover:underline">
                    Sign in
                </a>
            </p>

        </div>

    </main>

</body>
</html>