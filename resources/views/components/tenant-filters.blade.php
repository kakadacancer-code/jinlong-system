@props(['search' => '', 'status' => 'all', 'route'])

<form method="GET" action="{{ route('tenants.index') }}" class="flex items-center gap-3 flex-wrap mb-5">

    {{-- Search --}}
    <div class="relative flex-1 min-w-48 max-w-xs">
        <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-3.5 h-3.5 text-gray-400 pointer-events-none"
             fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
        </svg>

        <input type="text"
               name="search"
               value="{{ $search }}"
               placeholder="Search tenants..."
               class="w-full pl-9 pr-4 py-2 text-sm border border-gray-200 rounded-xl bg-white
                      focus:outline-none focus:ring-2 focus:ring-violet-400/30 focus:border-violet-400
                      text-gray-700 placeholder-gray-400 transition" />
    </div>

    {{-- Status pills --}}
    <div class="flex items-center gap-1.5">
        @foreach(['all' => 'All', 'active' => 'Active', 'pending' => 'Pending', 'expired' => 'Expired'] as $val => $label)
            <button type="submit" name="status" value="{{ $val }}"
                    class="px-3 py-1.5 rounded-full text-xs font-semibold transition-all
                        {{ $status === $val
                            ? 'bg-violet-600 text-white shadow-sm'
                            : 'bg-white border border-gray-200 text-gray-500 hover:border-violet-300 hover:text-violet-600' }}">
                {{ $label }}
            </button>
        @endforeach
    </div>

</form>