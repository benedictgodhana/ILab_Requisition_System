<x-layouts.admin-layout title="Admin Dashboard">
    <div class="p-">
        @if (session('success'))
            <div id="success-message" class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif


        @if (session('error'))
            <div id="success-message" class="bg-red-500 text-white p-4 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif



        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-semibold mb-4">My Requisitions</h2>



            <!-- Create New Requisition Button -->

            <!-- Search and Filter -->
            <div class="flex justify-between items-center mb-4">
                <div class="flex space-x-4">
    <input type="text" id="search-input" class="px-4 py-2 border rounded-md" placeholder="Search Requisitions" />
    <select id="status-filter" class="px-12 py-2 border rounded-md">
        <option value="">Filter by Status</option>
        <option value="pending">Pending</option>
        <option value="approved">Approved</option>
        <option value="rejected">Rejected</option>
    </select>
</div>

                <!-- Print and Export Buttons -->
                <div class="space-x-4">
    <!-- Create New Order Button -->

    <button onclick="window.location.href='{{ route('requisitions.create') }}'" class="px-4 py-2 bg-blue-500 text-white rounded-md mb-4 inline-flex items-center mr-4">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
    </svg>
    Create New Order
</button>
    <!-- Print Button -->
    <button id="print-btn" class="px-4 py-2 bg-green-500 text-white rounded-md inline-flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 14H18M12 10v4m7-3h-4V5a2 2 0 00-2-2H7a2 2 0 00-2 2v11H3a2 2 0 00-2 2v2a2 2 0 002 2h16a2 2 0 002-2v-2a2 2 0 00-2-2z" />
        </svg>
        Print
    </button>

    <!-- Export Button -->
    <button id="export-btn" class="px-4 py-2 bg-blue-500 text-white rounded-md inline-flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
        Export
    </button>
</div>

            </div>

            <div class="overflow-x-auto mt-4">
                <table id="requisitions-table" class="min-w-full bg-white border rounded-lg">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order Number</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Items Count</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Requested by</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Updated By</th>
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
                                <td class="px-6 py-4">{{ $requisition->user->name }}</td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
    @if($requisition->updated_by)
        {{ $requisition->updatedBy->name }} <!-- Display the name of the user who updated -->
    @else
        Not Updated
    @endif
</td>


                                <td class="px-6 py-4">{{ $requisition->status->name }}</td>

                                <td class="px-6 py-4">
                                    {{ \Carbon\Carbon::parse($requisition->created_at)->format('d M Y') }}
                                </td>
                                <td class="px-6 py-4 flex items-center space-x-2">
                                    <!-- View Button -->
                                    <a href="{{ route('requisition.view', $requisition->id) }}"
                                       class="px-4 py-2 bg-blue-500 text-white rounded-md inline-flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M15 12H9m4 8H9m7-7a5 5 0 100-10 5 5 0 000 10z" />
                                        </svg>
                                        View
                                    </a>

                                    <!-- Edit Button -->
                                    <a href="{{ route('requisition.edit', $requisition->id) }}"
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
                <br>
                <div class="pagination-links">
                    {{ $requisitions->links() }}
                </div>
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
            // Initialize the DataTable
            var table = $('#requisitions-table').DataTable({
                paging: false, // Disable default pagination
                searching: false, // Disable default search
                info: false // Disable the table info display
            });

            // Custom Search
            $('#search-input').on('keyup', function() {
                table.search(this.value).draw();
            });

            // Custom Filter (for status)
            $('#status-filter').on('change', function() {
                var status = this.value;
                if (status) {
                    table.column(3).search(status).draw(); // Filter by status column (index 3)
                } else {
                    table.column(3).search('').draw(); // Reset the filter if no status is selected
                }
            });

            // Print Button
            $('#print-btn').on('click', function() {
                window.print();
            });

            // Export Button (export to CSV example)
            $('#export-btn').on('click', function() {
                var csv = 'Date,Order Number,Items Count,Status,Date Needed\n';
                table.rows().every(function() {
                    var data = this.data();
                    csv += [
                        data[0], // Date
                        data[1], // Order Number
                        data[2], // Items Count
                        data[3], // Status
                        data[4]  // Date Needed
                    ].join(',') + '\n';
                });
                var blob = new Blob([csv], { type: 'text/csv' });
                var link = document.createElement('a');
                link.href = URL.createObjectURL(blob);
                link.download = 'requisitions.csv';
                link.click();
            });

            // Hide success message after 3 seconds
            setTimeout(() => {
                const message = document.getElementById('success-message');
                if (message) {
                    message.style.display = 'none';
                }
            }, 3000);
        });
    </script>
</x-layouts.admin-layout>
