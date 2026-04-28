@extends('layouts.app')

@section('title', isset($property) ? 'Edit Property' : 'Add Property')

@section('content')

{{-- Back link --}}
<a href="{{ route('properties.index') }}"
   class="inline-flex items-center gap-1.5 text-sm text-gray-400 hover:text-brand-600 transition-colors mb-6">
    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
        <polyline points="15 18 9 12 15 6"/>
    </svg>
    Back to Properties
</a>

<div class="bg-white rounded-2xl border border-gray-200 shadow-sm max-w-3xl">

    {{-- Form Header --}}
    <div class="px-8 py-6 border-b border-gray-100">
        <h2 class="font-display text-xl font-normal">
            {{ isset($property) ? 'Edit Property' : 'Add New Property' }}
        </h2>
        <p class="text-sm text-gray-400 mt-1">
            {{ isset($property) ? 'Update the details for ' . $property->name : 'Fill in the details to add a new rental property' }}
        </p>
    </div>

    {{--  Fixed action, method check, and variable name --}}
    <form method="POST"
          action="{{ isset($property) ? route('properties.update', $property->id) : route('properties.store') }}"
          enctype="multipart/form-data"
          class="px-8 py-7 space-y-5">
        @csrf
        @if(isset($property)) @method('PUT') @endif

        {{-- Name & Address --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div class="flex flex-col gap-1.5">
                <label class="text-[11px] uppercase tracking-wider font-semibold text-gray-500">Property Name *</label>
                <input type="text" name="name"
                       value="{{ old('name', $property->name ?? '') }}"
                       placeholder="e.g. BKK1 Modern Villa"
                       class="px-3.5 py-2.5 rounded-lg border text-sm text-gray-800
                              {{ $errors->has('name') ? 'border-red-400 bg-red-50' : 'border-gray-200' }}
                              focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition">
                @error('name')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col gap-1.5">
                <label class="text-[11px] uppercase tracking-wider font-semibold text-gray-500">Address *</label>
                <input type="text" name="address"
                       value="{{ old('address', $property->address ?? '') }}"
                       placeholder="e.g. Street 63, BKK1"
                       class="px-3.5 py-2.5 rounded-lg border text-sm text-gray-800
                              {{ $errors->has('address') ? 'border-red-400 bg-red-50' : 'border-gray-200' }}
                              focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition">
                @error('address')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>
        </div>

        {{-- Price, Status, Type --}}
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
            <div class="flex flex-col gap-1.5">
                <label class="text-[11px] uppercase tracking-wider font-semibold text-gray-500">Monthly Price ($) *</label>
                <input type="number" name="price"
                       value="{{ old('price', $property->price ?? '') }}"
                       placeholder="1200"
                       class="px-3.5 py-2.5 rounded-lg border text-sm text-gray-800
                              {{ $errors->has('price') ? 'border-red-400 bg-red-50' : 'border-gray-200' }}
                              focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition">
                @error('price')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col gap-1.5">
                <label class="text-[11px] uppercase tracking-wider font-semibold text-gray-500">Status</label>
                {{-- Fixed status values to match controller validation --}}
                <select name="status"
                        class="px-3.5 py-2.5 rounded-lg border border-gray-200 text-sm text-gray-800 bg-white cursor-pointer
                               focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition">
                    @foreach(['available' => 'Available', 'rented' => 'Rented', 'maintenance' => 'Maintenance'] as $val => $label)
                        <option value="{{ $val }}" {{ old('status', $property->status ?? 'available') === $val ? 'selected' : '' }}>
                            {{ $label }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col gap-1.5">
                <label class="text-[11px] uppercase tracking-wider font-semibold text-gray-500">Property Type</label>
                <select name="type"
                        class="px-3.5 py-2.5 rounded-lg border border-gray-200 text-sm text-gray-800 bg-white cursor-pointer
                               focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition">
                    @foreach(['Residential', 'Apartment', 'Villa', 'Commercial'] as $type)
                        <option value="{{ $type }}" {{ old('type', $property->type ?? 'Residential') === $type ? 'selected' : '' }}>
                            {{ $type }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        {{-- Bedrooms, Bathrooms, Size --}}
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
            @foreach([
                ['name' => 'bedrooms',  'label' => 'Bedrooms',   'placeholder' => '3'],
                ['name' => 'bathrooms', 'label' => 'Bathrooms',  'placeholder' => '2'],
                ['name' => 'size',      'label' => 'Size (m²)',  'placeholder' => '120'],
            ] as $field)
            <div class="flex flex-col gap-1.5">
                <label class="text-[11px] uppercase tracking-wider font-semibold text-gray-500">{{ $field['label'] }}</label>
                <input type="number" name="{{ $field['name'] }}"
                       value="{{ old($field['name'], $property->{$field['name']} ?? '') }}"
                       placeholder="{{ $field['placeholder'] }}"
                       class="px-3.5 py-2.5 rounded-lg border border-gray-200 text-sm text-gray-800
                              focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition">
            </div>
            @endforeach
        </div>

        {{-- Description --}}
        <div class="flex flex-col gap-1.5">
            <label class="text-[11px] uppercase tracking-wider font-semibold text-gray-500">Description</label>
            <textarea name="description" rows="4"
                      placeholder="Brief description of the property..."
                      class="px-3.5 py-2.5 rounded-lg border border-gray-200 text-sm text-gray-800 resize-y
                             focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-transparent transition">{{ old('description', $property->description ?? '') }}</textarea>
        </div>

        {{-- Image --}}
        <div class="flex flex-col gap-1.5">
            <label class="text-[11px] uppercase tracking-wider font-semibold text-gray-500">Property Image</label>
            <input type="file" name="image" accept="image/*"
                   class="px-3.5 py-2.5 rounded-lg border border-gray-200 text-sm text-gray-600
                          file:mr-3 file:py-1 file:px-3 file:rounded-md file:border-0
                          file:text-xs file:font-semibold file:bg-brand-50 file:text-brand-600
                          hover:file:bg-brand-100 cursor-pointer transition">
            @if(isset($property) && $property->image)
                <p class="text-xs text-gray-400">Current: {{ $property->image }} — upload a new file to replace it.</p>
            @endif
        </div>

        {{-- Form Footer --}}
        <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-100">
            {{--  Fixed cancel route --}}
            <a href="{{ route('properties.index') }}"
               class="px-4 py-2.5 text-sm font-semibold text-gray-600 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                Cancel
            </a>
            <button type="submit"
                    class="inline-flex items-center gap-2 px-5 py-2.5 bg-blue-600 hover:bg-brand-700
                           text-white text-sm font-semibold rounded-lg transition-all hover:-translate-y-0.5 shadow-sm">
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <polyline points="20 6 9 17 4 12"/>
                </svg>
                {{ isset($property) ? 'Save Changes' : 'Add Property' }}
            </button>
        </div>
    </form>
</div>

@endsection