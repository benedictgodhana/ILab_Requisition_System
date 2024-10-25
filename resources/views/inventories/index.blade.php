<x-app-layout>
    <div class="p-6">
        @if (session('success'))
            <div id="success-message" class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-semibold mb-4">Inventory</h2>

            <a href="{{ route('inventories.create') }}"
               class="px-4 py-2 bg-blue-500 text-white rounded-md mb-4 inline-flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add New Item
            </a>

            <div class="overflow-x-auto mt-4">
                <table id="inventories-table" class="min-w-full bg-white border rounded-lg">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Item Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cost Per Item</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Value</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Added By</th>
                            <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($inventories as $inventory)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">{{ $inventory->item_name }}</td>
                                <td class="px-6 py-4">{{ $inventory->quantity }}</td>
                                <td class="px-6 py-4">Ksh.{{ number_format($inventory->cost_per_item, 2) }}</td>
                                <td class="px-6 py-4">Ksh.{{ number_format($inventory->total_value, 2) }}</td>
                                <td class="px-6 py-4">{{ $inventory->user->name }}</td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('inventories.edit', $inventory->id) }}"
                                       class="px-4 py-2 bg-yellow-500 text-white rounded-md inline-flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232a2.828 2.828 0 114 4L7.5 21H3v-4.5L15.232 5.232z" />
                                        </svg>
                                        Edit
                                    </a>
                                    <form action="{{ route('inventories.destroy', $inventory->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md inline-flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $inventories->links() }} <!-- Pagination links -->
            </div>
        </div>
    </div>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include DataTables -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <script>
        // Initialize DataTables
        $(document).ready(function() {
            $('#inventories-table').DataTable({
                "ordering": true, // Enable ordering for all columns
                "pageLength": 10, // Set default page length
                "language": {
                    "search": "Search:", // Custom search label
                    "lengthMenu": "Display _MENU_ items per page" // Custom length menu
                }
            });
        });

        // Hide the success message after 4 seconds
        setTimeout(() => {
            const message = document.getElementById('success-message');
            if (message) {
                message.style.transition = 'opacity 0.5s';
                message.style.opacity = '0';

                setTimeout(() => message.remove(), 500); // Remove after fade-out
            }
        }, 4000);
    </script>

    <style>
        /* Add border to the table cells */
        #inventories-table td {
            border: 1px solid #e5e7eb; /* Light gray border */
        }

        /* Styling the search input */
        .dataTables_filter {
            margin-bottom: 20px; /* Spacing below the search input */
        }

        .dataTables_filter input {
            height: 40px; /* Height of the search input */
            padding: 10px; /* Padding inside the search input */
            border-radius: 4px; /* Rounded corners */
            border: 1px solid #ddd; /* Border color */
        }

        .dataTables_length {
            margin-bottom: 20px; /* Space below the length select */
        }
    </style>
</x-app-layout>
