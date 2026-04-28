{{-- resources/views/dashboard.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="flex h-screen bg-gray-50 overflow-hidden">

    {{-- Sidebar --}}
    

    {{-- Main --}}
    <div class="flex-1 flex flex-col overflow-hidden">

        {{-- Header --}}
        

        {{-- Content --}}
        <main class="flex-1 overflow-y-auto p-8">

            {{-- Greeting --}}
            <h2 class="text-3xl font-bold text-gray-900 mb-8">
                Welcome back, {{ auth()->user()->name ?? '' }}!
            </h2>

            {{-- Stat cards --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">

                <div class="bg-white rounded-2xl border border-gray-100 p-6
                            hover:shadow-md hover:-translate-y-0.5 transition-all duration-200">
                    <p class="text-sm text-gray-400 font-medium">Properties</p>
                    <p class="text-4xl font-bold text-gray-900 mt-3">{{ $propertyCount }}</p>
                </div>

                <div class="bg-white rounded-2xl border border-gray-100 p-6
                            hover:shadow-md hover:-translate-y-0.5 transition-all duration-200">
                    <p class="text-sm text-gray-400 font-medium">Active Tenants</p>
                    <p class="text-4xl font-bold text-gray-900 mt-3">3</p>
                </div>

                <div class="bg-white rounded-2xl border border-gray-100 p-6
                            hover:shadow-md hover:-translate-y-0.5 transition-all duration-200">
                    <p class="text-sm text-gray-400 font-medium">Monthly Revenue</p>
                    <p class="text-4xl font-bold text-gray-900 mt-3">$1850</p>
                </div>

                <div class="bg-white rounded-2xl border border-gray-100 p-6
                            hover:shadow-md hover:-translate-y-0.5 transition-all duration-200">
                    <p class="text-sm text-gray-400 font-medium">Pending Maintenance</p>
                    <p class="text-4xl font-bold text-gray-900 mt-3">2</p>
                </div>

            </div>

        </main>
    </div>
</div>
@endsection