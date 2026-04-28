{{-- resources/views/components/sidebar.blade.php --}}

@php
$current = Request::routeIs('dashboard') ? 'dashboard'
    : (Request::routeIs('properties*') ? 'properties'
    : (Request::routeIs('tenants*')    ? 'tenants'
    : (Request::routeIs('payments*')   ? 'payments'
    : (Request::routeIs('maintenance*')? 'maintenance'
    : ''))));
@endphp

<aside class="w-64 shrink-0 bg-white h-screen flex flex-col border-r border-gray-100">

    {{-- Brand --}}
    <div class="flex items-center gap-3 px-5 py-6">
        <div class="w-10 h-10 rounded-2xl flex items-center justify-center
                    text-white font-bold text-xl shrink-0 select-none"
             style="background: linear-gradient(135deg, #6d28d9, #8b5cf6);
                    box-shadow: 0 4px 12px rgba(109,40,217,.3);">
            
        </div>
        <div class="leading-tight">
            <p class="font-bold text-gray-900 text-[1.05rem]">Jinlong System</p>
            <p class="text-xs text-gray-400">Property Management</p>
        </div>
    </div>

    {{-- Nav --}}
    <nav class="flex-1 overflow-y-auto px-3 space-y-0.5">

        {{-- Dashboard --}}
        <a href="{{ route('dashboard') }}"
           class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition-all duration-150
                  {{ $current === 'dashboard' ? 'text-white shadow-md' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-800' }}"
           @if($current === 'dashboard') style="background: linear-gradient(135deg, #6d28d9, #8b5cf6);" @endif>
            <svg class="w-[18px] h-[18px] shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="3" width="7" height="7" rx="1"/>
                <rect x="14" y="3" width="7" height="7" rx="1"/>
                <rect x="3" y="14" width="7" height="7" rx="1"/>
                <rect x="14" y="14" width="7" height="7" rx="1"/>
            </svg>
            Dashboard
        </a>

        {{-- Properties: route('properties') → route('properties.index') --}}
        <a href="{{ route('properties.index') }}"

        {{-- Tenants: route('tenants') → route('tenants.index') --}}
        <a href="{{ route('tenants.index') }}"

        {{-- Payments --}}
        <a href="{{ route('payments') }}"
           class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition-all duration-150
                  {{ $current === 'payments' ? 'text-white shadow-md' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-800' }}"
           @if($current === 'payments') style="background: linear-gradient(135deg, #6d28d9, #8b5cf6);" @endif>
            <svg class="w-[18px] h-[18px] shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                <rect x="2" y="5" width="20" height="14" rx="2"/>
                <path d="M2 10h20"/>
            </svg>
            Payments
        </a>

        {{-- Maintenance --}}
        <a href="{{ route('maintenance') }}"
           class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-sm font-medium transition-all duration-150
                  {{ $current === 'maintenance' ? 'text-white shadow-md' : 'text-gray-500 hover:bg-gray-50 hover:text-gray-800' }}"
           @if($current === 'maintenance') style="background: linear-gradient(135deg, #6d28d9, #8b5cf6);" @endif>
            <svg class="w-[18px] h-[18px] shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                <path d="M14.7 6.3a1 1 0 000 1.4l1.6 1.6a1 1 0 001.4 0l3.77-3.77a6 6 0 01-7.94 7.94l-6.91 6.91a2.12 2.12 0 01-3-3l6.91-6.91a6 6 0 017.94-7.94l-3.76 3.76z"/>
            </svg>
            Maintenance
        </a>

    </nav>

    {{-- Logout --}}
    <div class="px-3 pb-5 pt-3 border-t border-gray-100">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                    class="flex items-center gap-3 w-full px-4 py-2.5 rounded-xl
                           text-sm font-medium text-gray-500
                           hover:bg-gray-50 hover:text-gray-800 transition-colors">
                <svg class="w-[18px] h-[18px] shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4"/>
                    <polyline points="16 17 21 12 16 7"/>
                    <line x1="21" y1="12" x2="9" y2="12"/>
                </svg>
                Logout
            </button>
        </form>
    </div>

</aside>