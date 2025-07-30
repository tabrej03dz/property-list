<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use App\Models\Property;
use App\Models\PropertyType;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $propertyTypes = PropertyType::all();
        return view('frontend.index', compact('propertyTypes'));
    }

    public function about(){
        return view('frontend.about');
    }

    public function contact(){
        return view('frontend.contact');
    }

    public function buy(){
        $properties = Property::where('type', 'sale')->get();
        return view('frontend.buy', compact('properties'));
    }


    public function typedProperty(Request $request, $type = null)
    {
        $query = Property::query()->with('propertyType');
        $recommendations = null;

        // Type filter (from route param or form input)
        $finalType = $type ?? $request->type;
        if ($finalType) {
            $query->where('type', $finalType);
            $recommendations = Property::where('type', $finalType)->get();

        }

        // Property type filter
        if ($request->filled('property_type_id')) {
            $query->where('property_type_id', $request->property_type_id);
            $recommendations = Property::where('property_type_id', $request->property_type_id)->get();
        }

        // Location filter (partial match)
        if ($request->filled('location')) {
            $query->where('address', 'like', '%' . $request->location . '%');
        }

        // Price range filters
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        // Bedrooms filter
        if ($request->filled('bedrooms')) {
            $query->where('bedrooms', '>=', $request->bedrooms);
        }
        $properties = $query->get();
        return view('frontend.typed-property', compact('properties', 'recommendations'));
    }


    public function rent(){
        $properties = Property::where('type', 'rent')->get();
        return view('frontend.rent', compact('properties'));
    }

    public function villa(){
        return view('frontend.villa');
    }

    public function categoryProperties(PropertyType $propertyType){
        $properties = $propertyType->properties;
        return view('frontend.category-properties', compact('properties', 'propertyType'));
    }

    public function land(){
        return view('frontend.land');
    }

    public function commercial(){
        return view('frontend.commercial');
    }

    public function blog(){
        return view('frontend.blog');
    }

    public function detail(Property $property){

        return view('frontend.detail', compact('property'));
    }

    public function term(){
        return view('frontend.term');
    }

    public function privacy(){
        return view('frontend.privacy');
    }

    public function refund(){
        return view('frontend.refund');
    }

    public function disclaimer(){
        return view('frontend.disclaimer');
    }

    public function contactSave(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'nullable',
            'message' => 'nullable',
        ]);

        Enquiry::create($request->all() + ['user_id' => auth()->check() ? auth()->id() : null]);
        return back()->with('success', 'Form submitted successfully we contact you back soon!');
    }
}

