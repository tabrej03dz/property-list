<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center bg-white shadow-md px-6 py-4 rounded-lg">
            <h2 class="font-bold text-2xl text-gray-800">
                {{ isset($city) ? 'Edit City' : 'Add City' }}
            </h2>

            <a href="{{ route('cities.index') }}"
               class="text-sm text-gray-700 hover:underline">← Back to Cities</a>
        </div>
    </x-slot>

    <div class="mt-10 md:px-8 lg:px-16">
        <div class="bg-white shadow rounded-lg p-6">
            <form method="POST" action="{{ isset($city) ? route('cities.update', $city->id) : route('cities.store') }}">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block font-medium text-gray-700">City Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $city->name ?? '') }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-[#c21108] focus:border-[#c21108]">
                        @error('name')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="state" class="block font-medium text-gray-700">State</label>
                        <input type="text" id="state" name="state" value="{{ old('state', $city->state ?? '') }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-[#c21108] focus:border-[#c21108]">
                        @error('state')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="country" class="block font-medium text-gray-700">Country</label>
                        <input type="text" id="country" name="country" value="{{ old('country', $city->country ?? '') }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-[#c21108] focus:border-[#c21108]">
                        @error('country')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit"
                            class="bg-gradient-to-r from-[#c21108] to-[#000308] text-white px-6 py-2 rounded-md hover:from-[#000308] hover:to-[#c21108] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#c21108] transition duration-300">
                        {{ isset($city) ? 'Update City' : 'Create City' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
