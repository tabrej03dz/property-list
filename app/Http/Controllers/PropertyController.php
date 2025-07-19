<?php

namespace App\Http\Controllers;

use App\Models\Amenity;
use App\Models\City;
use App\Models\Property;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::latest()->with('propertyType', 'city')->paginate(10);
        return view('properties.index', compact('properties'));
    }

    public function create()
    {
        $propertyTypes = PropertyType::all();
        $cities = City::all();
        $amenities = Amenity::all();
        return view('properties.form', compact('propertyTypes', 'cities', 'amenities'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'type' => 'required|in:rent,sale',
            'status' => 'required|in:available,sold,rented',
            'property_type_id' => 'required|exists:property_types,id',
            'city_id' => 'nullable|exists:cities,id',
            'address' => 'nullable|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'bedrooms' => 'nullable|integer',
            'bathrooms' => 'nullable|integer',
            'area' => 'nullable|numeric',
            'built_in' => 'nullable|digits:4',

            'amenities' => 'nullable|array',
            'amenities.*' => 'exists:amenities,id',

            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpg,jpeg,png|max:2048',

            'main_image_index' => 'nullable|integer|min:0',
        ]);

        // Generate unique slug
        $slug = Str::slug($request->title);
        $originalSlug = $slug;
        $counter = 1;

        while (Property::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter++;
        }

        // Create property
        $property = Property::create($request->except('images', 'amenities', 'main_image_index') + ['slug' => $slug, 'listed_by' => auth()->id()]);

        // Sync amenities
        $property->amenities()->sync($request->amenities ?? []);

        // Save property images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('property-images', 'public');

                $property->images()->create([
                    'url' => $path,
                    'is_main' => ($index === (int) $request->main_image_index),
                ]);
            }
        }

        return redirect()->route('properties.index')->with('success', 'Property created with images and amenities.');
    }

    public function edit(Property $property)
    {
        $propertyTypes = PropertyType::all();
        $cities = City::all();
        $amenities = Amenity::all();
        $property->load('amenities');

        return view('properties.form', compact('property', 'propertyTypes', 'cities', 'amenities'));
    }

    public function show(Property $property){
        return view('properties.show', compact('property'));
    }

    public function update(Request $request, Property $property)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'type' => 'required|in:rent,sale',
            'status' => 'required|in:available,sold,rented',
            'property_type_id' => 'required|exists:property_types,id',
            'city_id' => 'nullable|exists:cities,id',
            'address' => 'nullable|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'bedrooms' => 'nullable|integer',
            'bathrooms' => 'nullable|integer',
            'area' => 'nullable|numeric',
            'built_in' => 'nullable|digits:4',

            'amenities' => 'nullable|array',
            'amenities.*' => 'exists:amenities,id',

            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpg,jpeg,png|max:2048',

            'main_image_index' => 'nullable|integer|min:0',
        ]);

        // Generate new slug only if title has changed
        if ($request->title !== $property->title) {
            $slug = Str::slug($request->title);
            $originalSlug = $slug;
            $counter = 1;

            while (
            Property::where('slug', $slug)
                ->where('id', '!=', $property->id)
                ->exists()
            ) {
                $slug = $originalSlug . '-' . $counter++;
            }

            $property->slug = $slug;
        }

        // Update basic fields (excluding images and amenities)
        $property->update($request->except('images', 'amenities', 'main_image_index'), ['listed_by' => auth()->id()]);

        // Sync amenities
        $property->amenities()->sync($request->amenities ?? []);

        // If new images are uploaded, delete old ones and add new
        if ($request->hasFile('images')) {
            // Delete old image files from storage
            foreach ($property->images as $img) {
                Storage::disk('public')->delete($img->url);
            }

            // Delete old DB records
            $property->images()->delete();

            // Upload new images
            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('property-images', 'public');

                $property->images()->create([
                    'url' => $path,
                    'is_main' => ($index === (int) $request->main_image_index),
                ]);
            }
        }

        return redirect()->route('properties.index')->with('success', 'Property updated successfully.');
    }


    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->route('properties.index')->with('success', 'Property deleted successfully.');
    }
}
