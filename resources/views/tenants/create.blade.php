@extends('layouts.app')

@section('title', 'Create Tenant')

@section('content')

<div class="max-w-2xl mx-auto bg-white p-6 rounded-2xl shadow">

    <h1 class="text-2xl font-bold mb-6">Create Tenant</h1>

    <form action="{{ route('tenants.store') }}" method="POST" class="space-y-4">

        @csrf

        <input type="text" name="name" placeholder="Name"
               class="w-full border p-3 rounded-lg">

        <input type="text" name="phone" placeholder="Phone"
               class="w-full border p-3 rounded-lg">

        <input type="email" name="email" placeholder="Email"
               class="w-full border p-3 rounded-lg">

        <select name="status" class="w-full border p-3 rounded-lg">
            <option value="active">Active</option>
            <option value="pending">Pending</option>
            <option value="expired">Expired</option>
        </select>

        <button class="bg-violet-600 text-white px-5 py-3 rounded-lg">
            Save Tenant
        </button>

    </form>

</div>

@endsection