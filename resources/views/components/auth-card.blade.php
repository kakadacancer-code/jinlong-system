<div class="bg-white rounded-2xl p-10 w-full max-w-md shadow-[0_0_0_1px_rgba(0,0,0,0.06),0_8px_40px_rgba(0,0,0,0.10)]">

    {{-- Brand --}}
    <div class="flex flex-col items-center text-center mb-8">
        <div class="inline-flex items-center justify-center w-13 h-13 bg-gray-900 rounded-xl text-white mb-5 p-3">
            <svg width="28" height="28" viewBox="0 0 28 28" fill="none">
                <rect width="12" height="12" rx="3" fill="currentColor"/>
                <rect x="16" width="12" height="12" rx="3" fill="currentColor" opacity="0.6"/>
                <rect y="16" width="12" height="12" rx="3" fill="currentColor" opacity="0.6"/>
                <rect x="16" y="16" width="12" height="12" rx="3" fill="currentColor" opacity="0.3"/>
            </svg>
        </div>
        <h1 class="text-xl font-bold text-slate-900 tracking-tight mb-1">Jinlong System</h1>
        <p class="text-sm text-slate-500">Sign in to your account</p>
    </div>

    {{-- Validation errors --}}
    @if ($errors->any())
        <div class="flex items-center gap-2 bg-red-50 text-red-700 border border-red-200 rounded-xl px-4 py-3 text-sm mb-6">
            <svg class="shrink-0" width="16" height="16" viewBox="0 0 16 16" fill="none">
                <circle cx="8" cy="8" r="7.5" stroke="currentColor"/>
                <path d="M8 4.5V8.5M8 10.5V11.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
            </svg>
            {{ $errors->first() }}
        </div>
    @endif

    {{-- Form --}}
    <form method="POST" action="{{ route('login') }}" class="flex flex-col gap-5">
        @csrf

        {{-- Email --}}
        <div class="flex flex-col gap-1.5">
            <label for="email" class="text-xs font-medium text-gray-700 tracking-wide">
                Email address
            </label>
            <div class="relative">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none" width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <rect x="1" y="3" width="14" height="10" rx="2" stroke="currentColor" stroke-width="1.2"/>
                    <path d="M1 5.5L7.17 9.17a1.5 1.5 0 001.66 0L15 5.5" stroke="currentColor" stroke-width="1.2"/>
                </svg>
                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="you@example.com"
                    autocomplete="email"
                    autofocus
                    required
                    class="w-full pl-10 pr-4 py-2.5 text-sm text-gray-900 bg-gray-50 border rounded-xl outline-none transition placeholder:text-gray-300 focus:bg-white focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/10 {{ $errors->has('email') ? 'border-red-400 ring-2 ring-red-400/10' : 'border-gray-200' }}"
                />
            </div>
        </div>

        {{-- Password --}}
        <div class="flex flex-col gap-1.5">
            <div class="flex items-center justify-between">
                <label for="password" class="text-xs font-medium text-gray-700 tracking-wide">
                    Password
                </label>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-xs font-medium text-indigo-600 hover:underline">
                        Forgot password?
                    </a>
                @endif
            </div>
            <div class="relative">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none" width="16" height="16" viewBox="0 0 16 16" fill="none">
                    <rect x="3" y="7" width="10" height="8" rx="1.5" stroke="currentColor" stroke-width="1.2"/>
                    <path d="M5 7V5a3 3 0 016 0v2" stroke="currentColor" stroke-width="1.2" stroke-linecap="round"/>
                    <circle cx="8" cy="11" r="1" fill="currentColor"/>
                </svg>
                <input
                    id="password"
                    type="password"
                    name="password"
                    placeholder="••••••••"
                    autocomplete="current-password"
                    required
                    class="w-full pl-10 pr-4 py-2.5 text-sm text-gray-900 bg-gray-50 border rounded-xl outline-none transition placeholder:text-gray-300 focus:bg-white focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/10 {{ $errors->has('password') ? 'border-red-400 ring-2 ring-red-400/10' : 'border-gray-200' }}"
                />
            </div>
        </div>

        {{-- Remember me --}}
        <label class="flex items-center gap-2.5 cursor-pointer -mt-1">
            <input
                type="checkbox"
                name="remember"
                id="remember"
                {{ old('remember') ? 'checked' : '' }}
                class="w-4 h-4 rounded border-gray-300 accent-indigo-600 cursor-pointer"
            />
            <span class="text-sm text-gray-600">Remember me</span>
        </label>

        {{-- Submit --}}
        <button
            type="submit"
            class="flex items-center justify-center gap-2 w-full py-3 bg-gray-900 hover:bg-slate-800 active:scale-[.99] text-white text-sm font-semibold rounded-xl transition mt-1 cursor-pointer"
        >
            Sign in
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                <path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>

        <p class="text-center text-xs text-slate-500 mt-6">
                Create an account ?
                <a href="{{ route('register') }}" class="text-indigo-600 hover:underline">
                    Sign up
                </a>
            </p>

    </form>
</div>