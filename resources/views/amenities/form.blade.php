<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center bg-white shadow-md px-6 py-4 rounded-lg">
            <h2 class="font-bold text-2xl text-gray-800">
                {{ isset($amenity) ? 'Edit Amenity' : 'Add New Amenity' }}
            </h2>

            <a href="{{ route('amenities.index') }}"
               class="font-bold text-base text-white bg-gray-600 px-4 py-2 rounded-md shadow-md hover:bg-gray-800 transition duration-300 ease-in-out">
                ← Back to List
            </a>
        </div>
    </x-slot>

    <div class="max-w-3xl mx-auto py-10 px-6">
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ isset($amenity) ? route('amenities.update', $amenity->id) : route('amenities.store') }}"
              method="POST" enctype="multipart/form-data"
              class="space-y-6 bg-white p-8 rounded shadow">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700">Amenity Name</label>
                <input type="text" name="name" value="{{ old('name', $amenity->name ?? '') }}" required
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-[#c21108] focus:border-[#c21108]" />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">
                    Icon Class <span class="text-red-500">*</span>
                </label>

                <input type="text" name="icon"
                       value="{{ old('icon', $amenity->icon ?? '') }}"
                       placeholder="e.g. fas fa-home"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-[#c21108] focus:border-[#c21108]" />

                <p class="text-xs text-gray-500 mt-1">Enter a FontAwesome or similar icon class. Example: <code>fas fa-car</code></p>

                @if(isset($amenity) && $amenity->icon)
                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Current Icon Preview:</label>
                        <div class="flex items-center gap-4">
                            <input type="text" readonly
                                   value="{{ $amenity->icon }}"
                                   class="w-full border border-gray-300 bg-gray-100 rounded-md shadow-sm text-gray-600 cursor-not-allowed" />

                            <i class="{{ $amenity->icon }} text-2xl text-gray-800"></i>
                        </div>
                    </div>
                @endif
            </div>




            <div class="pt-4">
                <button type="submit"
                        class="{{ isset($amenity) ? 'bg-blue-600 hover:bg-blue-700' : 'bg-[#c21108] hover:bg-[#000308]' }} text-white px-6 py-2 rounded shadow-md transition">
                    {{ isset($amenity) ? 'Update Amenity' : 'Save Amenity' }}
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
