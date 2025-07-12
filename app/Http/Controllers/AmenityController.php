<?php

namespace App\Http\Controllers;

use App\Models\Amenity;
use Illuminate\Http\Request;

class AmenityController extends Controller
{
    // Show all amenities
    public function index()
    {
        $amenities = Amenity::latest()->paginate(10);
        return view('amenities.index', compact('amenities'));
    }

    // Show create form
    public function create()
    {
        return view('amenities.form');
    }

    // Store new amenity
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
        ]);

        Amenity::create($validated);

        return redirect()->route('amenities.index')->with('success', 'Amenity created successfully.');
    }

    // Show edit form
    public function edit(Amenity $amenity)
    {
        return view('amenities.form', compact('amenity'));
    }

    // Update amenity
    public function update(Request $request, Amenity $amenity)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
        ]);

        $amenity->update($validated);

        return redirect()->route('amenities.index')->with('success', 'Amenity updated successfully.');
    }

    // Delete amenity
    public function destroy(Amenity $amenity)
    {
        $amenity->delete();

        return redirect()->route('amenities.index')->with('success', 'Amenity deleted successfully.');
    }
}
