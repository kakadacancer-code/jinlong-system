@extends('layouts.app')

@section('title', 'Tenants')

@section('content')

{{-- Page Header --}}
<div class="flex items-center justify-between mb-6">
    <div>
        <h1 class="text-2xl font-bold text-gray-900 tracking-tight">
            Tenants
            <span class="text-lg font-normal text-gray-400 ml-1">({{ $tenants->count() }})</span>
        </h1>
        <p class="text-sm text-gray-400 mt-0.5">Manage all your tenants in one place</p>
    </div>
    <a href="{{ route('tenants.create') }}"
       class="inline-flex items-center gap-2 px-4 py-2.5 bg-violet-600 hover:bg-violet-700
              text-white text-sm font-semibold rounded-xl transition-all hover:-translate-y-0.5
              shadow-sm hover:shadow-md">
        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
            <line x1="12" y1="5" x2="12" y2="19"/>
            <line x1="5" y1="12" x2="19" y2="12"/>
        </svg>
        Add Tenant
    </a>
</div>

{{-- Stat Cards --}}
<x-tenant-stats :tenants="$tenants" />

{{-- Search & Filters --}}
<x-tenant-filters
    :search="request('search')"
    :status="request('status', 'all')"
    route="rents.index"
/>

{{-- Flash Message --}}
@if(session('success'))
    <x-alert type="success" :message="session('success')" class="mb-5" />
@endif

{{-- Tenants Table --}}
<x-tenant-table :tenants="$tenants" />

@endsection