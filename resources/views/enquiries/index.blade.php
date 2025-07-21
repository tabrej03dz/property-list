<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center bg-white shadow-md px-6 py-4 rounded-lg">
            <h2 class="font-bold text-2xl text-gray-800">
                {{ __('Enquiries') }}
            </h2>
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
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Name</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Email</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Phone</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Message</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Property</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-600 uppercase">Status</th>
                    <th class="px-6 py-3 text-right text-sm font-medium text-gray-600 uppercase">Actions</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                @forelse($enquiries as $index => $enquiry)
                    <tr>
                        <td class="px-6 py-4 text-sm text-gray-800">{{ $enquiries->firstItem() + $index }}</td>
                        <td class="px-6 py-4 text-sm text-gray-900 font-semibold">{{ $enquiry->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $enquiry->email }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $enquiry->phone }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $enquiry->message }}</td>
                        <td class="px-6 py-4 text-sm text-blue-600">
                            @if($enquiry->property)
                                <a href="{{ route('properties.edit', $enquiry->property->id) }}" class="hover:underline">
                                    {{ $enquiry->property->title }}
                                </a>
                            @else
                                -
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600 max-w-xs truncate">
                            <form action="{{ route('enquiries.status', $enquiry) }}" method="POST">
                                @csrf
                                <select name="status" onchange="this.form.submit()"
                                        class="block w-full text-sm rounded-md border border-gray-300 bg-white shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition ease-in-out duration-150 px-3 py-2 text-gray-700">
                                    <option value="pending" {{ $enquiry->status == 'pending' ? 'selected' : '' }}>🕒 Pending</option>
                                    <option value="contacted" {{ $enquiry->status == 'contacted' ? 'selected' : '' }}>📞 Contacted</option>
                                    <option value="in_progress" {{ $enquiry->status == 'in_progress' ? 'selected' : '' }}>🔧 In Progress</option>
                                    <option value="closed" {{ $enquiry->status == 'closed' ? 'selected' : '' }}>✅ Closed</option>
                                    <option value="rejected" {{ $enquiry->status == 'rejected' ? 'selected' : '' }}>❌ Rejected</option>
                                </select>
                            </form>
                        </td>

                        <td class="px-6 py-4 text-right text-sm">
                            <form action="{{ route('enquiries.destroy', $enquiry->id) }}" method="POST"
                                  onsubmit="return confirm('Are you sure you want to delete this enquiry?');"
                                  class="inline-block">
                                @csrf
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-4 text-center text-sm text-gray-500">No enquiries found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $enquiries->links() }}
        </div>
    </div>
</x-app-layout>
