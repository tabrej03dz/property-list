{{-- resources/views/lands/index.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center bg-white shadow-md px-6 py-4 rounded-lg">
            <h2 class="font-bold text-2xl text-gray-800">
                {{ __('Dashboard') }}
            </h2>

            <a href="{{ route('dashboard') }}"
               class="font-bold text-2xl text-white bg-gradient-to-r from-[#c21108] to-[#000308] px-4 py-2 rounded-md shadow-md inline-block hover:from-[#000308] hover:to-[#c21108] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#c21108] transition duration-300 ease-in-out">
                {{ __('Dashboard') }}
            </a>
        </div>
    </x-slot>

    <div class="mt-10 md:px-32">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3 mb-6">
            <h3 class="text-2xl font-bold text-gray-800">🏞️ Land Listings</h3>

            <div class="flex items-center gap-2">
                <a href="{{ route('lands.create') }}"
                   class="px-4 py-2 text-white bg-gradient-to-r from-[#c21108] to-[#000308] rounded-md shadow hover:from-[#000308] hover:to-[#c21108] transition">
                    + Add Land
                </a>
            </div>
        </div>

        {{-- Alerts --}}
        @if(session('success'))
            <div class="mb-4 rounded-md border border-green-200 bg-green-50 p-3 text-green-800">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="mb-4 rounded-md border border-red-200 bg-red-50 p-3 text-red-800">
                {{ session('error') }}
            </div>
        @endif

        {{-- Filters --}}
        <form method="GET" class="bg-white rounded-lg shadow p-4 mb-6">
            <div class="grid grid-cols-1 md:grid-cols-6 gap-3">
                <input type="text" name="q" value="{{ request('q') }}" placeholder="Search title/city/locality..."
                       class="border p-2 rounded col-span-2">

                <input type="text" name="city" value="{{ request('city') }}" placeholder="City"
                       class="border p-2 rounded">

                <select name="status" class="border p-2 rounded">
                    <option value="">Status</option>
                    @foreach(['draft','published','archived'] as $opt)
                        <option value="{{ $opt }}" @selected(request('status')==$opt)>{{ ucfirst($opt) }}</option>
                    @endforeach
                </select>

                <select name="listing_type" class="border p-2 rounded">
                    <option value="">Type</option>
                    @foreach(['sale','rent','lease'] as $opt)
                        <option value="{{ $opt }}" @selected(request('listing_type')==$opt)>{{ ucfirst($opt) }}</option>
                    @endforeach
                </select>

                <label class="inline-flex items-center gap-2">
                    <input type="checkbox" name="only_trashed" value="1" @checked(request('only_trashed'))
                           class="rounded border-gray-300">
                    <span class="text-sm text-gray-700">Only trashed</span>
                </label>
            </div>

            <div class="mt-3 flex items-center gap-2">
                <button class="px-4 py-2 bg-gray-900 text-white rounded hover:opacity-90">Apply</button>
                @if(request()->query())
                    <a href="{{ route('lands.index') }}" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Reset</a>
                @endif>
            </div>
        </form>

        {{-- Table --}}
        <div class="overflow-x-auto bg-white shadow rounded-lg">
            <table class="min-w-full text-sm">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="p-3 text-left font-semibold">Title</th>
                        <th class="p-3 text-left font-semibold">City</th>
                        <th class="p-3 text-left font-semibold">Price</th>
                        <th class="p-3 text-left font-semibold">Area</th>
                        <th class="p-3 text-left font-semibold">Status</th>
                        <th class="p-3 text-left font-semibold">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($lands as $land)
                        <tr class="border-t">
                            <td class="p-3 align-top">
                                <div class="font-semibold text-gray-900">
                                    <a href="{{ route('lands.show', $land) }}" class="hover:text-[#c21108]">
                                        {{ $land->title }}
                                    </a>
                                </div>
                                <div class="text-xs text-gray-500">
                                    {{ $land->reference_code ?: '—' }} · slug: {{ $land->slug }}
                                </div>
                                @if($land->primary_image)
                                    <img src="{{ asset('storage/'.$land->primary_image) }}"
                                         alt="{{ $land->title }}"
                                         class="mt-2 h-14 w-24 object-cover rounded">
                                @endif
                            </td>
                            <td class="p-3 align-top">{{ $land->city ?? '—' }}</td>
                            <td class="p-3 align-top">
                                {{ $land->price ? number_format($land->price,2).' '.$land->currency : '—' }}
                                <div class="text-xs text-gray-500">{{ $land->price_unit ?? 'total' }}</div>
                            </td>
                            <td class="p-3 align-top">
                                {{ $land->area_value ? $land->area_value.' '.$land->area_unit : '—' }}
                                @if($land->road_width)
                                    <div class="text-xs text-gray-500">Road: {{ $land->road_width }} {{ $land->road_unit }}</div>
                                @endif
                            </td>
                            <td class="p-3 align-top">
                                <span class="px-2 py-1 rounded text-white text-xs
                                    @if($land->status==='published') bg-green-600
                                    @elseif($land->status==='draft') bg-gray-600
                                    @else bg-yellow-600 @endif">
                                    {{ ucfirst($land->status) }}
                                </span>
                                <div class="text-xs text-gray-500 mt-1 capitalize">{{ $land->visibility }}</div>
                            </td>
                            <td class="p-3 align-top space-x-1">
                                <a href="{{ route('lands.edit', $land) }}"
                                   class="inline-block px-2 py-1 rounded bg-blue-600 text-white hover:opacity-90">Edit</a>

                                @if($land->trashed())
                                    <form action="{{ route('lands.restore', $land->id) }}" method="POST" class="inline">
                                        @csrf
                                        <button class="px-2 py-1 rounded bg-emerald-600 text-white hover:opacity-90">Restore</button>
                                    </form>
                                    <form action="{{ route('lands.forceDelete', $land->id) }}" method="POST" class="inline"
                                          onsubmit="return confirm('Permanently delete this land? This cannot be undone.');">
                                        @csrf @method('DELETE')
                                        <button class="px-2 py-1 rounded bg-red-700 text-white hover:opacity-90">Force Delete</button>
                                    </form>
                                @else
                                    <form action="{{ route('lands.destroy', $land) }}" method="POST" class="inline"
                                          onsubmit="return confirm('Move to trash?');">
                                        @csrf @method('DELETE')
                                        <button class="px-2 py-1 rounded bg-red-600 text-white hover:opacity-90">Delete</button>
                                    </form>

                                    @if($land->status!=='published')
                                        <form action="{{ route('lands.publish', $land) }}" method="POST" class="inline">
                                            @csrf
                                            <button class="px-2 py-1 rounded text-white bg-gradient-to-r from-[#c21108] to-[#000308] hover:from-[#000308] hover:to-[#c21108]">
                                                Publish
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('lands.unpublish', $land) }}" method="POST" class="inline">
                                            @csrf
                                            <button class="px-2 py-1 rounded bg-gray-700 text-white hover:opacity-90">Unpublish</button>
                                        </form>
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-6 text-center text-gray-500">No lands found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $lands->links() }}
        </div>
    </div>
</x-app-layout>
