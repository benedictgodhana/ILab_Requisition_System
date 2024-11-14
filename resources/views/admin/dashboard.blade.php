<x-layouts.admin-layout title="Admin Dashboard">
    <div class="h-screen flex flex-col">
        <div class="flex-1 overflow-y-auto max-h-full p-6">
            <!-- Stats Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                <!-- Total Requisitions -->
                <div class="bg-gradient-to-r from-blue-500 to-blue-700 text-white shadow-lg rounded-lg p-6">
                    <h3 class="text-lg font-semibold">Total Requisitions</h3>
                    <p class="text-3xl font-bold mt-4">{{ $totalRequisitions }}</p>
                </div>

                <!-- Total Approved -->
                <div class="bg-gradient-to-r from-green-500 to-green-700 text-white shadow-lg rounded-lg p-6">
                    <h3 class="text-lg font-semibold">Total Approved</h3>
                    <p class="text-3xl font-bold mt-4">{{ $totalApproved }}</p>
                </div>

                <!-- Total Rejected -->
                <div class="bg-gradient-to-r from-red-500 to-red-700 text-white shadow-lg rounded-lg p-6">
                    <h3 class="text-lg font-semibold">Total Rejected</h3>
                    <p class="text-3xl font-bold mt-4">{{ $totalRejected }}</p>
                </div>

                <!-- Total Pending -->
                <div class="bg-gradient-to-r from-yellow-500 to-yellow-700 text-white shadow-lg rounded-lg p-6">
                    <h3 class="text-lg font-semibold">Pending Requisitions</h3>
                    <p class="text-3xl font-bold mt-4">{{ $totalPending }}</p>
                </div>
            </div>

            <!-- Chart Section -->

            <!-- Most Requested Items -->
            <div class="bg-white shadow-lg rounded-lg p-6 mt-6">
                <h3 class="text-lg font-semibold">Most Requested Items</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Current Month Top Requested -->
                    <div class="bg-blue-100 p-4 rounded-lg">
                        <h4 class="font-semibold">This Month's Top Requested Item</h4>
                        <p class="mt-2">Item: <strong>{{ $topRequestedCurrentItem }}</strong></p>
                        <p>Requests: <strong>{{ $topRequestedCurrentCount }}</strong></p>
                    </div>

                    <!-- Previous Month Top Requested -->
                    <div class="bg-blue-100 p-4 rounded-lg">
                        <h4 class="font-semibold">Last Month's Top Requested Item</h4>
                        <p class="mt-2">Item: <strong>{{ $topRequestedPreviousItem }}</strong></p>
                        <p>Requests: <strong>{{ $topRequestedPreviousCount }}</strong></p>
                    </div>
                </div>
            </div>

            <!-- Most Recently Created Requisitions -->
            <div class="bg-white shadow-lg rounded-lg p-6 mt-6">
    <h3 class="text-lg font-semibold">Most Recently Created Requisitions</h3>
    <table class="min-w-full table-auto mt-4">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="px-4 py-2">Order Number</th>
                <th class="px-4 py-2">Requested By</th>
                <th class="px-4 py-2">Item Count</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($recentRequisitions as $requisition)
                <tr class="border-b">
                    <td class="px-4 py-2">{{ $requisition->order_number }}</td>
                    <td class="px-4 py-2">{{ $requisition->user->name ?? 'N/A' }}</td>
                    <td class="px-4 py-2">{{ count($requisition->orderItems) }} item(s)</td>
                    <td class="px-4 py-2">{{ $requisition->status->name ?? 'N/A' }}</td>


                    <td class="px-4 py-2">
                        <a href="{{ route('requisitions.view', $requisition->id) }}" class="text-blue-500 hover:text-blue-700 mr-3">View</a>
                        <a href="{{ route('requisitions.edit', $requisition->id) }}" class="text-yellow-500 hover:text-yellow-700">Edit</a>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>

        </div>
    </div>

    <script>
        // Set up the requisition overview chart
        const ctx1 = document.getElementById('requisitionChart').getContext('2d');
        new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: ['Pending', 'Approved', 'Rejected'],
                datasets: [{
                    label: 'Requisitions',
                    data: [{{ $totalPending }}, {{ $totalApproved }}, {{ $totalRejected }}],
                    backgroundColor: ['#4CAF50', '#2196F3', '#F44336'],
                    borderColor: ['#388E3C', '#1976D2', '#D32F2F'],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Set up the status chart
        const ctx2 = document.getElementById('statusChart').getContext('2d');
        new Chart(ctx2, {
            type: 'pie',
            data: {
                labels: ['Approved', 'Pending', 'Rejected'],
                datasets: [{
                    label: 'Status',
                    data: [{{ $totalApproved }}, {{ $totalPending }}, {{ $totalRejected }}],
                    backgroundColor: ['#4CAF50', '#FFC107', '#F44336'],
                }]
            }
        });

        // Set up the monthly trends chart
        const ctx3 = document.getElementById('monthlyTrendsChart').getContext('2d');
        new Chart(ctx3, {
            type: 'line',
            data: {
                labels: @json($monthlyTrendsLabels),
                datasets: [{
                    label: 'Requisitions',
                    data: @json($monthlyTrendsData),
                    borderColor: '#2196F3',
                    backgroundColor: 'rgba(33, 150, 243, 0.2)',
                    fill: true
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</x-layouts.admin-layout>
