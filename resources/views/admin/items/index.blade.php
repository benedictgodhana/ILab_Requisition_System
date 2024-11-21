<x-layouts.admin-layout title="Items List">
    <div class="h-screen flex flex-col">
        <div class="flex-1 overflow-y-auto max-h-full p-6">
            <div class="bg-white shadow-md rounded-lg p-6">

                @if(session('success'))
                    <div id="successAlert" class="bg-green-500 text-white p-4 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-bold">Items List</h2>
                    <a href="{{ route('items.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">Add Item</a>
                </div>

                <!-- Search, Filter, and Action Buttons -->
                <form method="GET" action="{{ route('items.index') }}" class="mb-4 flex flex-wrap items-center space-x-4">
                    <div class="flex-1">
                        <!-- Search -->
                        <label for="search" class="block text-sm font-medium text-gray-700">Search</label>
                        <input
                            type="text"
                            name="search"
                            id="search"
                            value="{{ request('search') }}"
                            placeholder="Enter name or code"
                            class="px-4 py-2 border rounded-md w-full"
                        />
                    </div>

                    <div class="flex-1">
                        <!-- Reorder Level Filter -->
                        <label for="reorder_level" class="block text-sm font-medium text-gray-700">Reorder Level</label>
                        <input
                            type="number"
                            name="reorder_level"
                            id="reorder_level"
                            value="{{ request('reorder_level') }}"
                            placeholder="Max reorder level"
                            class="px-4 py-2 border rounded-md w-full"
                        />
                    </div>

                    <!-- Filter, Reset, Print, and Export Buttons -->
                    <div class="flex space-x-4">
                        <!-- Filter Button -->
                        <button
                            type="submit"
                            class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition"
                        >
                            Filter
                        </button>

                        <!-- Reset Button -->
                        <a
                            href="{{ route('items.index') }}"
                            class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition"
                        >
                            Reset
                        </a>



                        <!-- Export Button -->

                    </div>
                </form>

                <!-- Assuming you have the search and filter form in your view -->
<form method="GET" action="{{ route('items.export') }}" class="inline">
    <input type="hidden" name="search" value="{{ request('search') }}">
    <input type="hidden" name="reorder_level" value="{{ request('reorder_level') }}">
    <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 transition mb-4"
>
        Export
    </button>
</form>

<form method="GET" action="{{ route('items.exportPdf') }}" class="inline">
    <input type="hidden" name="search" value="{{ request('search') }}">
    <input type="hidden" name="reorder_level" value="{{ request('reorder_level') }}">
    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 transition">
        Export as PDF
    </button>
</form>



                <!-- Items Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b">Name</th>
                                <th class="py-2 px-4 border-b">Description</th>
                                <th class="py-2 px-4 border-b">Unique Code</th>
                                <th class="py-2 px-4 border-b">Manufacturer Code</th>
                                <th class="py-2 px-4 border-b">Reorder Level</th>
                                <th class="py-2 px-4 border-b">Created By</th>
                                <th class="py-2 px-4 border-b">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                                <tr class="text-center">
                                    <td class="py-2 px-4 border-b">{{ $item->name }}</td>
                                    <td class="py-2 px-4 border-b">{{ $item->description }}</td>
                                    <td class="py-2 px-4 border-b">{{ $item->unique_code }}</td>
                                    <td class="py-2 px-4 border-b">{{ $item->manufacturer_code }}</td>
                                    <td class="py-2 px-4 border-b">{{ $item->reorder_level }}</td>
                                    <td class="py-2 px-4 border-b">{{ $item->user->name ?? 'N/A' }}</td>
                                    <td class="py-2 px-4 border-b flex justify-center space-x-2">
                                        <a href="{{ route('items.show', $item->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded flex items-center hover:bg-blue-600 transition">
                                            <i class="fa fa-eye mr-1"></i> View
                                        </a>
                                        <a href="{{ route('items.edit', $item->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded flex items-center hover:bg-yellow-600 transition">
                                            <i class="fa fa-pencil-alt mr-1"></i> Edit
                                        </a>
                                        <form action="{{ route('items.destroy', $item->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded flex items-center hover:bg-red-600 transition">
                                                <i class="fa fa-trash mr-1"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="py-4 text-center">No items found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-4">
                    {{ $items->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Include Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <script>
        // Export function (to CSV or another format)
        function exportItems() {
            // Implement export logic, e.g., send a request to export data
            window.location.href = "{{ route('items.export') }}"; // Example route for export
        }
    </script>
</x-layouts.admin-layout>
