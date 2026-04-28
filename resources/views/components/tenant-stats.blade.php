@props(['tenants'])

@php
$stats = [
    [
        'label' => 'Total Tenants',
        'value' => $tenants->count(),
        'color' => '#7C3AED',
        'bg' => '#EDE9FE',
        'icon' => '<path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/>'
    ],
    [
        'label' => 'Active Leases',
        'value' => $tenants->where('status','active')->count(),
        'color' => '#0D9488',
        'bg' => '#CCFBF1',
        'icon' => '<polyline points="20 6 9 17 4 12"/>'
    ],
    [
        'label' => 'Monthly Revenue',
        'value' => '$'.number_format($tenants->where('status','active')->sum('price')),
        'color' => '#2563EB',
        'bg' => '#DBEAFE',
        'icon' => '<line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/>'
    ],
    [
        'label' => 'Pending',
        'value' => $tenants->where('status','pending')->count(),
        'color' => '#D97706',
        'bg' => '#FEF3C7',
        'icon' => '<circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>'
    ],
];
@endphp

<div class="grid grid-cols-2 xl:grid-cols-4 gap-4 mb-7">
    @foreach($stats as $s)
        <div class="bg-white rounded-2xl border border-gray-100 p-5 flex items-center gap-4 shadow-sm">
            <div class="w-11 h-11 rounded-xl flex items-center justify-center"
                 style="background: {{ $s['bg'] }}">
                <svg class="w-5 h-5" fill="none"
                     stroke="{{ $s['color'] }}"
                     stroke-width="2"
                     viewBox="0 0 24 24">
                    {!! $s['icon'] !!}
                </svg>
            </div>

            <div>
                <p class="text-xs text-gray-400 uppercase tracking-wide mb-1">
                    {{ $s['label'] }}
                </p>

                <p class="text-2xl font-bold text-gray-900">
                    {{ $s['value'] }}
                </p>
            </div>
        </div>
    @endforeach
</div>