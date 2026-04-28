@extends('layouts.app')

@section('title','Edit Property')

@section('content')

<div class="max-w-2xl mx-auto bg-white p-8 rounded-2xl shadow">

<h1 class="text-2xl font-bold mb-6">
Edit Property
</h1>

<form action="{{ route('properties.update',$property->id) }}"
      method="POST"
      class="space-y-5">

@csrf
@method('PUT')

<div>
<label class="block mb-2 font-medium">
Name
</label>

<input type="text"
name="name"
value="{{ old('name',$property->name) }}"
class="w-full border rounded-lg p-3">
</div>


<div>
<label class="block mb-2 font-medium">
Address
</label>

<input type="text"
name="address"
value="{{ old('address',$property->address) }}"
class="w-full border rounded-lg p-3">
</div>


<div>
<label class="block mb-2 font-medium">
Price
</label>

<input type="number"
name="price"
value="{{ old('price',$property->price) }}"
class="w-full border rounded-lg p-3">
</div>


<div>
<label class="block mb-2 font-medium">
Status
</label>

<select name="status"
class="w-full border rounded-lg p-3">

<option value="available"
{{ $property->status=='available'?'selected':'' }}>
Available
</option>

<option value="rented"
{{ $property->status=='rented'?'selected':'' }}>
Rented
</option>

<option value="maintenance"
{{ $property->status=='maintenance'?'selected':'' }}>
Maintenance
</option>

</select>
</div>


<div class="flex gap-3 pt-4">
<button class="px-5 py-3 bg-blue-600 text-white rounded-lg">
Update
</button>

<a href="{{ route('properties.show',$property->id) }}"
class="px-5 py-3 border rounded-lg">
Cancel
</a>
</div>

</form>

</div>

@endsection