@extends('layouts.app')

@section('title', 'Properties')

@section('content')

{{-- Page Header --}}
<div class="flex items-center justify-between mb-7">
    <div>
        <h1 class="font-display text-2xl font-normal">Properties ({{ $properties->count() }})</h1>
        <p class="text-sm text-gray-400 mt-0.5">All rental properties in your portfolio</p>
    </div>
    <a href="{{ route('properties.create') }}"
       class="inline-flex items-center gap-2 px-4 py-2.5 bg-blue-600 hover:bg-brand-700 text-white text-sm font-semibold rounded-lg transition-all hover:-translate-y-0.5 shadow-sm hover:shadow-md">
        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
            <line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/>
        </svg>
        Add Property
    </a>
</div>

@if($properties->isEmpty())
    {{-- Empty state --}}
    <div class="text-center py-24 text-gray-400">
        <svg class="mx-auto mb-4 opacity-25" width="64" height="64" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
            <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
            <polyline points="9 22 9 12 15 12 15 22"/>
        </svg>
        <p class="text-base mb-5">No properties yet. Add your first one!</p>
        <a href="{{ route('properties.create') }}"
           class="inline-flex items-center gap-2 px-4 py-2.5 bg-blue-600 text-white text-sm font-semibold rounded-lg hover:bg-brand-700 transition-colors">
            Add Property
        </a>
    </div>

@else
    {{-- Properties Grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-5">
        @foreach($properties as $rent)
        {{-- ✅ Fixed: $rent->id not $properties->id --}}
        <a href="{{ route('properties.show', $rent->id) }}"
           class="block bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden
                  hover:shadow-lg hover:-translate-y-1 transition-all duration-200 group">

            {{-- Image --}}
            <div class="w-full h-48 bg-gray-100 overflow-hidden flex items-center justify-center text-5xl">
                {{-- ✅ Fixed: $rent->image not $properties->image --}}
                @if(!empty($rent->image))
                    <img src="{{ asset('storage/' . $rent->image) }}"
                        alt="{{ $rent->name }}"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                @else
                    <img src="{{ asset('images/condo-interior-design.webp') }}"
                        alt="Default Property"
                        class="w-full h-full object-cover">
                @endif
            </div>

            {{-- Body --}}
            <div class="p-5">
                <h3 class="font-display text-lg leading-tight mb-1">{{ $rent->name }}</h3>
                <p class="text-xs text-gray-400 mb-4 flex items-center gap-1">
                    <svg width="11" height="11" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/>
                    </svg>
                    {{-- ✅ Fixed: $rent->address --}}
                    {{ $rent->address ?? 'No address' }}
                </p>
                <div class="flex items-end justify-between">
                    <div>
                        {{-- ✅ Fixed: $rent->price --}}
                        <span class="text-2xl font-bold text-gray-900">${{ number_format($rent->price ?? 0) }}</span>
                        <span class="text-xs text-gray-400 block leading-none mt-0.5">per month</span>
                    </div>
                    @php
                        $statusClasses = [
                            'available'   => 'bg-green-100 text-green-700',
                            'rented'      => 'bg-blue-100 text-blue-700',
                            'maintenance' => 'bg-red-100 text-red-600',
                            ];
                            // use $rent->status
                            $status = $rent->status ?? 'available';
                            $cls = $statusClasses[$status] ?? 'bg-gray-100 text-gray-500';
                        @endphp
                    <span class="px-2.5 py-1 rounded-full text-xs font-semibold {{ $cls }}">
                        {{ ucfirst($status) }}
                    </span>
                </div>
            </div>
        </a>
        @endforeach
    </div>
@endif

@endsection