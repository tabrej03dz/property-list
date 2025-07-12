<?php

namespace App\Http\Controllers;

use App\Models\PropertyType;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PropertyTypeController extends Controller
{
    public function index()
    {
        $propertyTypes = PropertyType::latest()->paginate(10);
        return view('property_types.index', compact('propertyTypes'));
    }

    /**
     * Show the form for creating a new property type.
     */
    public function create()
    {
        return view('property_types.create');
    }

    /**
     * Store a newly created property type in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:property_types,title',
        ]);

        PropertyType::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
        ]);

        return redirect()->route('property-types.index')->with('success', 'Property Type created successfully.');
    }


    /**
     * Show the form for editing the specified property type.
     */
    public function edit(PropertyType $propertyType)
    {
        return view('property_types.create', compact('propertyType'));
    }

    /**
     * Update the specified property type in storage.
     */
    public function update(Request $request, PropertyType $propertyType)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:property_types,title,' . $propertyType->id,
        ]);

        $propertyType->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
        ]);

        return redirect()->route('property-types.index')->with('success', 'Property Type updated successfully.');
    }

    /**
     * Remove the specified property type from storage.
     */
    public function destroy(PropertyType $propertyType)
    {
        $propertyType->delete();
        return redirect()->route('property-types.index')->with('success', 'Property Type deleted successfully.');
    }
}
