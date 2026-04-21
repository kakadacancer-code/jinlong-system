<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="min-h-screen flex items-center justify-center px-4 py-12 bg-gray-50">
        <div class="w-full max-w-md bg-white border border-gray-100 rounded-2xl shadow-sm px-8 py-10">

            {{-- Brand --}}
            <div class="text-center mb-8">
                <div class="w-10 h-10 mx-auto mb-4 rounded-lg border border-gray-100 bg-gray-50 flex items-center justify-center text-lg">
                    ✦
                </div>
                <h1 class="text-xl font-semibold text-gray-900 tracking-tight">Welcome back</h1>
                <p class="text-sm text-gray-500 mt-1">Sign in to your account to continue</p>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- Email --}}
                <div class="mb-5">
                    <x-input-label for="email" :value="__('Email address')" class="text-xs font-medium text-gray-500 uppercase tracking-wide mb-1.5" />
                    <x-text-input
                        id="email"
                        class="block w-full px-3.5 py-2.5 text-sm bg-gray-50 border border-gray-200 rounded-lg focus:bg-white focus:border-gray-400 focus:ring-0 transition"
                        type="email"
                        name="email"
                        :value="old('email')"
                        placeholder="you@example.com"
                        required autofocus autocomplete="username"
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-1.5 text-xs text-red-500" />
                </div>

                {{-- Password --}}
                <div class="mb-5">
                    <x-input-label for="password" :value="__('Password')" class="text-xs font-medium text-gray-500 uppercase tracking-wide mb-1.5" />
                    <x-text-input
                        id="password"
                        class="block w-full px-3.5 py-2.5 text-sm bg-gray-50 border border-gray-200 rounded-lg focus:bg-white focus:border-gray-400 focus:ring-0 transition"
                        type="password"
                        name="password"
                        placeholder="••••••••"
                        required autocomplete="current-password"
                    />
                    <x-input-error :messages="$errors->get('password')" class="mt-1.5 text-xs text-red-500" />
                </div>

                {{-- Remember + Forgot --}}
                <div class="flex items-center justify-between mb-6">
                    <label for="remember_me" class="inline-flex items-center gap-2 cursor-pointer">
                        <input id="remember_me" type="checkbox" name="remember"
                            class="w-3.5 h-3.5 rounded border-gray-300 text-indigo-600 focus:ring-0">
                        <span class="text-sm text-gray-500">{{ __('Remember me') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                           class="text-sm text-gray-500 hover:text-gray-800 border-b border-gray-200 hover:border-gray-500 transition">
                            {{ __('Forgot password?') }}
                        </a>
                    @endif
                </div>

                {{-- Submit --}}
                <x-primary-button class="w-full justify-center py-2.5 text-sm font-medium tracking-wide rounded-lg">
                    {{ __('Sign in') }}
                </x-primary-button>

                {{-- Divider --}}
                <div class="flex items-center gap-3 my-5 text-xs text-gray-300">
                    <span class="flex-1 h-px bg-gray-100"></span>
                    <span>or</span>
                    <span class="flex-1 h-px bg-gray-100"></span>
                </div>

                {{-- Register --}}
                <p class="text-center text-sm text-gray-500">
                    {{ __("Don't have an account?") }}
                    <a href="{{ route('register') }}"
                       class="text-gray-800 font-medium border-b border-gray-300 hover:border-gray-800 transition ml-0.5">
                        {{ __('Register here') }}
                    </a>
                </p>

            </form>
        </div>
    </div>
</x-guest-layout>