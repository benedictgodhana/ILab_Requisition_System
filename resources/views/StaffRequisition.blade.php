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
            <button id="create-requisition"
                    class="px-4 py-2 bg-blue-500 text-white rounded-md mb-4 inline-flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Create New Order
            </button>

            <div class="overflow-x-auto mt-4">
                <table id="requisitions-table" class="min-w-full bg-white border rounded-lg">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order Number</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Items</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created By</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date Needed</th>
                            <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($requisitions as $requisition)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">{{ \Carbon\Carbon::parse($requisition->created_at)->format('d M Y, h:i A') }}</td>
                                <td class="px-6 py-4">{{ $requisition->order_number }}</td>
                                <td class="px-6 py-4"></td>
                                <td class="px-6 py-4">{{ $requisition->user->name }}</td>
                                <td class="px-6 py-4">{{ $requisition->status->name }}</td>
                                <td class="px-6 py-4">{{ \Carbon\Carbon::parse($requisition->date_needed)->format('d M Y') }}</td>
                                <td class="px-6 py-4 flex items-center space-x-2">
                                    <a href="{{ route('requisitions.edit', $requisition->id) }}"
                                       class="px-4 py-2 bg-yellow-500 text-white rounded-md inline-flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232a2.828 2.828 0 114 4L7.5 21H3v-4.5L15.232 5.232z" />
                                        </svg>
                                        Edit
                                    </a>
                                    <form action="{{ route('requisitions.destroy', $requisition->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md inline-flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                            Delete
                                        </button>
                                    </form>
                                    @if ($requisition->status->name == 'Created') <!-- Show Request Items button if the status is 'Created' -->
                                        <a href="{{ route('items.request', $requisition->id) }}"
                                           class="px-4 py-2 bg-green-500 text-white rounded-md inline-flex items-center">
                                            Request Items
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Confirmation Modal -->
    <div id="confirmation-modal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg p-6 shadow-lg max-w-md">
            <h3 class="text-xl font-semibold mb-4">Confirm Order Creation</h3>
            <p>Are you sure you want to create a new order?</p>
            <div class="mt-6 flex justify-end">
                <button id="cancel-btn" class="px-4 py-2 mr-2 bg-gray-500 text-white rounded-md">Cancel</button>
                <button id="confirm-btn" class="px-4 py-2 bg-blue-500 text-white rounded-md">Confirm</button>
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

            // Show the confirmation modal
            $('#create-requisition').click(function() {
                $('#confirmation-modal').removeClass('hidden');
            });

            // Handle cancel button click
            $('#cancel-btn').click(function() {
                $('#confirmation-modal').addClass('hidden');
            });

            // Handle confirm button click
            $('#confirm-btn').click(function() {
                $.ajax({
                    url: '{{ route('requisitions.store') }}',
                    type: 'POST',
                    data: { _token: '{{ csrf_token() }}' },
                    success: function(response) {
                        $('#confirmation-modal').addClass('hidden');
                        // Display success message
                        $('#success-message').text('Order Header Created Successfully!').removeClass('hidden');

                        // Automatically hide the success message after 3 seconds
                        setTimeout(() => {
                            $('#success-message').fadeOut(500, function() {
                                $(this).remove(); // Remove the element after fading out
                            });
                        }, 3000);

                        // Optionally reload or update the table here
                        // location.reload(); // Uncomment if you want to refresh the page
                    },
                    error: function(xhr) {
                        alert('An error occurred while creating the requisition.');
                    }
                });
            });

            // Hide the success message after 3 seconds
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
