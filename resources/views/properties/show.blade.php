@extends('layouts.app')

@section('title', $property->name)

@section('content')

<div class="max-w-5xl mx-auto">

<a href="{{ route('properties.index') }}"
class="text-sm text-gray-500 hover:text-blue-600 mb-6 inline-block">
← Back
</a>

<div class="bg-white rounded-2xl shadow border overflow-hidden">

    <div class="h-96 bg-gray-100">
        @if($property->image)
            <img src="{{ asset('storage/'.$property->image) }}"
                 class="w-full h-full object-cover">
        @else
            <img src="{{ asset('images/condo-interior-design.webp') }}"
                 class="w-full h-full object-cover">
        @endif
    </div>

    <div class="p-8">

        <div class="flex justify-between mb-6">
            <div>
                <h1 class="text-3xl font-bold">
                    {{ $property->name }}
                </h1>

                <p class="text-gray-500 mt-2">
                    {{ $property->address }}
                </p>
            </div>

            <span class="px-4 py-2 rounded-full bg-green-100 text-green-700">
                {{ ucfirst($property->status) }}
            </span>
        </div>

        <div class="grid md:grid-cols-3 gap-5 mb-8">

            <div class="bg-gray-50 p-5 rounded-xl">
                <p class="text-sm text-gray-400">
                    Rent
                </p>

                <h3 class="text-2xl font-bold">
                    ${{ number_format($property->price) }}
                </h3>
            </div>

            <div class="bg-gray-50 p-5 rounded-xl">
                <p class="text-sm text-gray-400">
                    Property ID
                </p>

                <h3 class="text-xl font-semibold">
                    #{{ $property->id }}
                </h3>
            </div>

            <div class="bg-gray-50 p-5 rounded-xl">
                <p class="text-sm text-gray-400">
                    Created
                </p>

                <h3 class="text-xl font-semibold">
                    {{ $property->created_at->format('M d, Y') }}
                </h3>
            </div>

        </div>

        <h2 class="text-xl font-semibold mb-3">
            Description
        </h2>

        <p class="text-gray-600">
            {{ $property->description ?? 'No description available.' }}
        </p>

        {{-- Actions --}}
        <div class="mt-8 flex items-center gap-3">

            <a href="{{ route('properties.edit', $property->id) }}"
            class="px-5 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium transition">
                Edit Property
            </a>


            <form action="{{ route('properties.destroy', $property->id) }}"
                method="POST"
                onsubmit="return confirm('Delete this property?')">
                @csrf
                @method('DELETE')

                <button type="submit"
                    class="px-5 py-3 bg-red-600 hover:bg-red-700 text-white rounded-lg font-medium transition">
                    Delete
                </button>
            </form>


            <a href="{{ route('properties.index') }}"
            class="px-5 py-3 border rounded-lg hover:bg-gray-50">
                Back
            </a>

        </div>

    </div>

</div>

</div>

@endsection