<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class PropertyController extends Controller
{
    public function index()
    {
        $title = "Property List";
        $properties = Property::all();

        return view('properties.index', compact('title', 'properties'));
    }

    public function form()
    {
        return view('properties.create');
    }

    public function store(Request $request)
    {
        // ← validate first
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'price'   => 'required|numeric|min:0',
            'status'  => 'required|in:available,rented,maintenance',
        ]);

        Property::create($validated); // ← actually save it

        return redirect()->route('properties.index')
                         ->with('success', 'Property created successfully.');
    }

    public function show($id)
    {
        $property = Property::findOrFail($id);

        return view('properties.show', compact('property')); // ← return a view
    }

    public function edit($id)
    {
        $property = Property::findOrFail($id);

        return view('properties.edit', compact('property')); // ← was missing entirely
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'price'   => 'required|numeric|min:0',
            'status'  => 'required|in:available,rented,maintenance',
        ]);

        $property = Property::findOrFail($id);
        $property->update($validated); // ← validate before update, not $request->all()

        return redirect()->route('properties.index')
                         ->with('success', 'Property updated successfully.');
    }

    public function destroy($id)
    {
        Property::destroy($id);

        return redirect()->route('properties.index')
                         ->with('success', 'Property deleted successfully.'); // ← redirect not JSON
    }
}