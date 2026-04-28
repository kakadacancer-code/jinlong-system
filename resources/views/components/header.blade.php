<!-- <header class="h-16 bg-white border-b flex items-center justify-between px-6">
    <h2 class="text-lg font-semibold">{{ $title }}</h2>

    <div class="flex items-center gap-3">
        <div class="w-8 h-8 bg-indigo-600 text-white flex items-center justify-center rounded-full">
            {{ substr(auth()->user()->name ?? 'K', 0, 1) }}
        </div>
        <span>{{ auth()->user()->name ?? 'Guest' }}</span>
    </div>
</header>{{-- resources/views/components/header.blade.php --}} -->

@props(['title' => 'Dashboard'])

<header class="h-16 bg-white border-b border-gray-100 flex items-center justify-between px-8 shrink-0">

    {{-- Page title --}}
    <h2 class="text-[1.1rem] font-semibold text-gray-800">{{ $title }}</h2>

    {{-- User info --}}
    <div class="flex items-center gap-3">
        <div class="w-9 h-9 rounded-full flex items-center justify-center
                    text-white text-sm font-semibold select-none"
             style="background: linear-gradient(135deg, #6d28d9, #8b5cf6);">
            {{ strtoupper(substr(auth()->user()->name ?? 'K', 0, 1)) }}
        </div>
        <div class="leading-tight text-right">
            <p class="text-sm font-semibold text-gray-800">{{ auth()->user()->name ?? 'Guest' }}</p>
            <p class="text-xs text-gray-400">Phnom Penh</p>
        </div>
    </div>

</header>