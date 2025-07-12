<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center bg-white shadow-md px-6 py-4 rounded-lg">
            <h2 class="font-bold text-2xl text-gray-800">
                {{ isset($propertyType) ? 'Edit Property Type' : 'Add New Property Type' }}
            </h2>

            <a href="{{ route('property-types.index') }}"
               class="font-bold text-base text-white bg-gradient-to-r from-[#c21108] to-[#000308] px-4 py-2 rounded-md shadow-md hover:from-[#000308] hover:to-[#c21108] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#c21108] transition duration-300 ease-in-out">
                ← Back to List
            </a>
        </div>
    </x-slot>

    <div class="mt-10 md:px-8 lg:px-16 max-w-2xl mx-auto">
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-800 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ isset($propertyType) ? route('property-types.update', $propertyType->id) : route('property-types.store') }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
            @csrf

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                <input type="text" name="title" id="title"
                       class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-[#c21108] focus:border-[#c21108] sm:text-sm"
                       placeholder="Enter Property Type Title"
                       value="{{ old('title', $propertyType->title ?? '') }}" required>
            </div>

            <div class="flex justify-end">
                <button type="submit"
                        class="bg-gradient-to-r from-[#c21108] to-[#000308] text-white font-semibold px-6 py-2 rounded-md shadow-md hover:from-[#000308] hover:to-[#c21108] transition duration-300">
                    {{ isset($propertyType) ? 'Update' : 'Save' }}
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
