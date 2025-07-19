<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center bg-white shadow-md px-6 py-4 rounded-lg">
            <h2 class="font-bold text-2xl text-gray-800">
                {{ __('Cities') }}
            </h2>

            <a href="{{ route('cities.create') }}"
               class="font-bold text-base text-white bg-gradient-to-r from-[#c21108] to-[#000308] px-4 py-2 rounded-md shadow-md hover:from-[#000308] hover:to-[#c21108] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#c21108] transition duration-300 ease-in-out">
                + Add New
            </a>
        </div>
    </x-slot>

    <div class="mt-10 md:px-8 lg:px-16">
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">#</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">City</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">State</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Country</th>
                    <th class="px-6 py-3 text-right text-sm font-medium text-gray-600 uppercase">Actions</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                @forelse($cities as $index => $city)
                    <tr>
                        <td class="px-6 py-4 text-sm text-gray-800">{{ $cities->firstItem() + $index }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900 font-semibold">{{ $city->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $city->state }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $city->country }}</td>
                        <td class="px-6 py-4 text-right text-sm">
                            <a href="{{ route('cities.edit', $city->id) }}"
                               class="text-blue-600 hover:underline mr-3">Edit</a>

                            <form action="{{ route('cities.destroy', $city->id) }}" method="POST" class="inline-block"
                                  onsubmit="return confirm('Are you sure you want to delete this city?');">
                                @csrf
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">No cities found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $cities->links() }}
        </div>
    </div>
</x-app-layout>
