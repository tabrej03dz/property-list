<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center bg-white shadow-md px-6 py-4 rounded-lg">
            <h2 class="font-bold text-2xl text-gray-800">
                {{ isset($property) ? 'Edit Property' : 'Add New Property' }}
            </h2>

            <a href="{{ route('properties.index') }}"
               class="font-bold text-base text-white bg-gray-600 px-4 py-2 rounded-md shadow-md hover:bg-gray-800 transition duration-300 ease-in-out">
                ← Back to List
            </a>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 px-6">
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ isset($property) ? route('properties.update', $property->id) : route('properties.store') }}"
              method="POST" enctype="multipart/form-data"
              class="space-y-6 bg-white p-8 rounded shadow">
            @csrf

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" name="title" value="{{ old('title', $property->title ?? '') }}" required
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Price (INR)</label>
                    <input type="number" name="price" value="{{ old('price', $property->price ?? '') }}" required
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Type</label>
                    <select name="type" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        <option value="">-- Select Type --</option>
                        <option value="rent" {{ old('type', $property->type ?? '') == 'rent' ? 'selected' : '' }}>Rent</option>
                        <option value="sale" {{ old('type', $property->type ?? '') == 'sale' ? 'selected' : '' }}>Sale</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Status</label>
                    <select name="status" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        <option value="">-- Select Status --</option>
                        <option value="available" {{ old('status', $property->status ?? '') == 'available' ? 'selected' : '' }}>Available</option>
                        <option value="sold" {{ old('status', $property->status ?? '') == 'sold' ? 'selected' : '' }}>Sold</option>
                        <option value="rented" {{ old('status', $property->status ?? '') == 'rented' ? 'selected' : '' }}>Rented</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Property Type</label>
                    <select name="property_type_id" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        <option value="">-- Select Category --</option>
                        @foreach($propertyTypes as $type)
                            <option value="{{ $type->id }}"
                                {{ old('property_type_id', $property->property_type_id ?? '') == $type->id ? 'selected' : '' }}>
                                {{ $type->title }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">City</label>
                    <select name="city_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        <option value="">-- Select City --</option>
                        @foreach($cities as $city)
                            <option value="{{ $city->id }}"
                                {{ old('city_id', $property->city_id ?? '') == $city->id ? 'selected' : '' }}>
                                {{ $city->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Address</label>
                    <input type="text" name="address" value="{{ old('address', $property->address ?? '') }}"
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Area (sqft)</label>
                    <input type="number" step="0.1" name="area" value="{{ old('area', $property->area ?? '') }}"
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Built In (Year)</label>
                    <input type="text" name="built_in" maxlength="4" value="{{ old('built_in', $property->built_in ?? '') }}"
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Listed By (User ID)</label>
                    <input type="number" name="listed_by" value="{{ old('listed_by', $property->listed_by ?? '') }}" required
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" rows="4"
                          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('description', $property->description ?? '') }}</textarea>
            </div>

            <div class="grid md:grid-cols-3 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Bedrooms</label>
                    <input type="number" name="bedrooms" value="{{ old('bedrooms', $property->bedrooms ?? '') }}"
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Bathrooms</label>
                    <input type="number" name="bathrooms" value="{{ old('bathrooms', $property->bathrooms ?? '') }}"
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Main Image Index (0-based)</label>
                    <input type="number" name="main_image_index" value="{{ old('main_image_index', 0) }}"
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Latitude</label>
                <input type="text" name="latitude" value="{{ old('latitude', $property->latitude ?? '') }}"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Longitude</label>
                <input type="text" name="longitude" value="{{ old('longitude', $property->longitude ?? '') }}"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Amenities</label>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-2 mt-1">
                    @foreach($amenities as $amenity)
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="amenities[]" value="{{ $amenity->id }}"
                                   {{ in_array($amenity->id, old('amenities', isset($property) ? $property->amenities->pluck('id')->toArray() : [])) ? 'checked' : '' }}
                                   class="form-checkbox text-indigo-600">
                            <span class="ml-2 text-sm text-gray-700">{{ $amenity->name }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Images</label>
                <input type="file" name="images[]" multiple accept="image/*"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                <p class="text-xs text-gray-500 mt-1">Upload JPG/PNG images, max 2MB each</p>
            </div>

            <div class="pt-6">
                <button type="submit"
                        class="px-6 py-2 text-white {{ isset($property) ? 'bg-blue-600 hover:bg-blue-700' : 'bg-[#c21108] hover:bg-[#000308]' }} rounded shadow-md transition">
                    {{ isset($property) ? 'Update Property' : 'Save Property' }}
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
