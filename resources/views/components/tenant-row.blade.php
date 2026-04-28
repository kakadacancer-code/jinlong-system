@props(['rent'])

@php
    // Avatar
    $initials = collect(explode(' ', $rent->tenant_name))
        ->map(fn($w) => strtoupper($w[0] ?? ''))
        ->take(2)->join('');
    $palette  = ['#7C3AED','#0D9488','#E11D48','#2563EB','#D97706','#4F46E5'];
    $avatarBg = $palette[abs(crc32($rent->tenant_name)) % count($palette)];

    // Badge
    $badge = match($rent->status ?? 'active') {
        'active'  => ['bg' => 'bg-emerald-50',  'text' => 'text-emerald-700', 'dot' => 'bg-emerald-500'],
        'pending' => ['bg' => 'bg-amber-50',     'text' => 'text-amber-700',   'dot' => 'bg-amber-400'],
        'expired' => ['bg' => 'bg-red-50',       'text' => 'text-red-600',     'dot' => 'bg-red-400'],
        default   => ['bg' => 'bg-gray-100',     'text' => 'text-gray-500',    'dot' => 'bg-gray-400'],
    };
@endphp

{{-- Actions --}}
<td class="px-5 py-3.5">
    <div class="flex items-center justify-end gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
        <a href="{{ route('properties.show', $rent->id) }}"
           class="w-7 h-7 rounded-lg flex items-center justify-center text-gray-400
                  hover:text-violet-600 hover:bg-violet-50 transition-colors" title="View">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                <circle cx="12" cy="12" r="3"/>
            </svg>
        </a>
        <a href="{{ route('properties.edit', $rent->id) }}"
           class="w-7 h-7 rounded-lg flex items-center justify-center text-gray-400
                  hover:text-blue-600 hover:bg-blue-50 transition-colors" title="Edit">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/>
                <path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/>
            </svg>
        </a>
        <form method="POST" action="{{ route('properties.destroy', $rent->id) }}"
              onsubmit="return confirm('Delete this property?')">
            @csrf @method('DELETE')
            <button type="submit"
                    class="w-7 h-7 rounded-lg flex items-center justify-center text-gray-400
                           hover:text-red-500 hover:bg-red-50 transition-colors" title="Delete">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <polyline points="3 6 5 6 21 6"/>
                    <path d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6"/>
                    <path d="M10 11v6"/><path d="M14 11v6"/>
                    <path d="M9 6V4a1 1 0 011-1h4a1 1 0 011 1v2"/>
                </svg>
            </button>
        </form>
    </div>
</td>