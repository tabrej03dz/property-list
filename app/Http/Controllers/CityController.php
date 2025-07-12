<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::latest()->paginate(10); // paginate if needed
        return view('cities.index', compact('cities'));
    }

    // 📝 Show create form
    public function create()
    {
        return view('cities.form');
    }

    // 💾 Store new city
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'country' => 'required|string|max:255',
        ]);

        City::create($validated);

        return redirect()->route('cities.index')->with('success', 'City created successfully.');
    }


    // ✏️ Edit form
    public function edit(City $city)
    {
        return view('cities.form', compact('city'));
    }

    // 🛠️ Update city
    public function update(Request $request, City $city)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'country' => 'required|string|max:255',
        ]);

        $city->update($validated);

        return redirect()->route('cities.index')->with('success', 'City updated successfully.');
    }

    // ❌ Delete city
    public function destroy(City $city)
    {
        $city->delete();

        return redirect()->route('cities.index')->with('success', 'City deleted successfully.');
    }
}
