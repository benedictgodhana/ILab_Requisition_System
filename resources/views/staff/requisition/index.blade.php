<x-app-layout>
    <div class="p-6">
        @if (session('success'))
            <div id="success-message" class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-semibold mb-4">My Requisitions</h2>

            <!-- Create New Requisition Button -->
            <a href="{{ route('requisitions.create') }}"
               class="px-4 py-2 bg-blue-500 text-white rounded-md mb-4 inline-flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-5 h-5 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Create New Order
            </a>

            <div class="overflow-x-auto mt-4">
                <table id="requisitions-table" class="min-w-full bg-white border rounded-lg">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order Number</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Items Count</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date Needed</th>
                            <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($requisitions as $requisition)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">
                                    {{ \Carbon\Carbon::parse($requisition->created_at)->format('d M Y, h:i A') }}
                                </td>
                                <td class="px-6 py-4">{{ $requisition->order_number }}</td>
                                <td class="px-6 py-4">
                                    {{ $requisition->orderItems->count() }} item(s)
                                </td>
                                <td class="px-6 py-4">{{ $requisition->status->name }}</td>
                                <td class="px-6 py-4">
                                    {{ \Carbon\Carbon::parse($requisition->date_needed)->format('d M Y') }}
                                </td>
                                <td class="px-6 py-4 flex items-center space-x-2">
                                    <!-- View Button -->
                                    <a href="{{ route('requisitions.show', $requisition->id) }}"
                                       class="px-4 py-2 bg-blue-500 text-white rounded-md inline-flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M15 12H9m4 8H9m7-7a5 5 0 100-10 5 5 0 000 10z" />
                                        </svg>
                                        View
                                    </a>

                                    <!-- Edit Button -->
                                    <a href="{{ route('requisitions.edit', $requisition->id) }}"
                                       class="px-4 py-2 bg-yellow-500 text-white rounded-md inline-flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M15 12H9m4 8H9m7-7a5 5 0 100-10 5 5 0 000 10z" />
                                        </svg>
                                        Edit
                                    </a>

                                    <!-- Delete Button -->
                                    <form action="{{ route('requisitions.destroy', $requisition->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md inline-flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" fill="none"
                                                 viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M6 18L18 6M6 6l12 12" />
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
        </div>
    </div>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include DataTables -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <script>
        $(document).ready(function() {
            $('#requisitions-table').DataTable();

            // Hide success message after 3 seconds
            setTimeout(() => {
                const message = document.getElementById('success-message');
                if (message) {
                    message.style.transition = 'opacity 0.5s';
                    message.style.opacity = '0';
                    setTimeout(() => message.remove(), 500);
                }
            }, 3000);
        });
    </script>

    <style>
        #requisitions-table td {
            border: 1px solid #e5e7eb;
        }
        .dataTables_filter {
            margin-bottom: 20px;
        }
        .dataTables_filter input {
            height: 40px;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ddd;
        }
        .dataTables_length {
            margin-bottom: 20px;
        }
    </style>
</x-app-layout>
