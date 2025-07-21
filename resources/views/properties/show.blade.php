<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center bg-white shadow-md px-6 py-4 rounded-lg">
            <h2 class="font-bold text-2xl text-gray-800">View Property</h2>
            <a href="{{ route('properties.index') }}"
               class="font-bold text-base text-white bg-gray-600 px-4 py-2 rounded-md shadow-md hover:bg-gray-800 transition duration-300 ease-in-out">
                ← Back to List
            </a>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 px-6">
        <div class="space-y-6 bg-white p-8 rounded shadow">

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Title</label>
                    <p class="mt-1 text-sm text-gray-800 bg-gray-50 p-2 rounded">{{ $property->title }}</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Price (INR)</label>
                    <p class="mt-1 text-sm text-gray-800 bg-gray-50 p-2 rounded">₹{{ number_format($property->price) }}</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Type</label>
                    <p class="mt-1 text-sm text-gray-800 bg-gray-50 p-2 rounded">{{ ucfirst($property->type) }}</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Status</label>
                    <p class="mt-1 text-sm text-gray-800 bg-gray-50 p-2 rounded">{{ ucfirst($property->status) }}</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Property Type</label>
                    <p class="mt-1 text-sm text-gray-800 bg-gray-50 p-2 rounded">{{ $property->propertyType->title ?? '-' }}</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">City</label>
                    <p class="mt-1 text-sm text-gray-800 bg-gray-50 p-2 rounded">{{ $property->city->name ?? '-' }}</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Address</label>
                    <p class="mt-1 text-sm text-gray-800 bg-gray-50 p-2 rounded">{{ $property->address }}</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Area (sqft)</label>
                    <p class="mt-1 text-sm text-gray-800 bg-gray-50 p-2 rounded">{{ $property->area }}</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Built In (Year)</label>
                    <p class="mt-1 text-sm text-gray-800 bg-gray-50 p-2 rounded">{{ $property->built_in }}</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Listed By (User ID)</label>
                    <p class="mt-1 text-sm text-gray-800 bg-gray-50 p-2 rounded">{{ $property->listed_by }}</p>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Description</label>
                <p class="mt-1 text-sm text-gray-800 bg-gray-50 p-3 rounded whitespace-pre-line">
                    {{ $property->description }}
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Bedrooms</label>
                    <p class="mt-1 text-sm text-gray-800 bg-gray-50 p-2 rounded">{{ $property->bedrooms }}</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Bathrooms</label>
                    <p class="mt-1 text-sm text-gray-800 bg-gray-50 p-2 rounded">{{ $property->bathrooms }}</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Main Image Index</label>
                    <p class="mt-1 text-sm text-gray-800 bg-gray-50 p-2 rounded">{{ $property->main_image_index }}</p>
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Latitude</label>
                    <p class="mt-1 text-sm text-gray-800 bg-gray-50 p-2 rounded">{{ $property->latitude }}</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Longitude</label>
                    <p class="mt-1 text-sm text-gray-800 bg-gray-50 p-2 rounded">{{ $property->longitude }}</p>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Amenities</label>
                <ul class="list-disc list-inside text-sm text-gray-800 grid grid-cols-2 md:grid-cols-4 gap-2">
                    @foreach($property->amenities as $amenity)
                        <li>{{ $amenity->name }}</li>
                    @endforeach
                </ul>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Images</label>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    @foreach($property->images as $image)

                        <img src="{{ asset('storage/' . $image->url) }}" alt="Property Image" class="rounded shadow">
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
