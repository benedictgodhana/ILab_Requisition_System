<x-app-layout>
    <div class=" flex flex-col">
        <div class="flex-1 overflow-y-auto max-h-full">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 ">
    <!-- Analytical Card 1: Total Requisitions -->
    <div class="bg-white text-gray-800 shadow-sm rounded-lg p-6 hover:shadow-md transition-shadow duration-300 border-2 border-gray-300">
        <h3 class=" font-semibold flex items-center mb-2">
            <i class="fa fa-list-alt mr-2 text-gray-600"></i>Total Requisitions
        </h3>
        <p class="text-3xl font-bold">{{ $totalRequisitions }}</p>
    </div>

    <!-- Analytical Card 2: Highly Requested Item -->
    <div class="bg-white text-gray-800 shadow-sm rounded-lg p-6 hover:shadow-md transition-shadow duration-300 border-2 border-gray-300">
        <h3 class=" font-semibold flex items-center mb-2">
            <i class="fa fa-check-circle mr-2 text-gray-600"></i>Highly Requested Item
        </h3>
        <div>
            <p class="text-sm font-bold text-gray-500">This Month:</p>
            <p class="text-xl font-semibold">{{ $topRequestedCurrentItem }} ({{ $topRequestedCurrentCount }} times)</p>
        </div>
        <div class="mt-2">
            <p class="text-sm font-bold text-gray-500">Last Month:</p>
            <p class="text-xl font-semibold">{{ $topRequestedPreviousItem }} ({{ $topRequestedPreviousCount }} times)</p>
        </div>
    </div>

    <!-- Analytical Card 3: Pending Requisitions -->
    <div class="bg-white text-gray-800 shadow-sm rounded-lg p-6 hover:shadow-md transition-shadow duration-300 border-2 border-gray-300">
        <h3 class=" font-semibold flex items-center mb-2">
            <i class="fa fa-hourglass-half mr-2 text-gray-600"></i>Pending Requisitions
        </h3>
        <p class="text-3xl font-bold">{{ $totalPending }}</p>
    </div>
</div>





            <br>

            <div class="bg-white shadow-lg rounded-lg p-2  ">
            <div class="p-">
        @if (session('success'))
            <div id="success-message" class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
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
    <a href="{{ route('requisitions.export') }}" class="px-4 py-2 bg-green-500 text-white rounded-md inline-flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
        Export to Excel
    </a>

    <!-- Print to PDF -->
    <a href="{{ route('requisitions.print') }}" class="px-4 py-2 bg-red-500 text-white rounded-md inline-flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 14H18M12 10v4m7-3h-4V5a2 2 0 00-2-2H7a2 2 0 00-2 2v11H3a2 2 0 00-2 2v2a2 2 0 002 2h16a2 2 0 002-2v-2a2 2 0 00-2-2z" />
        </svg>
        Print
    </a>
</div>

            </div>

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
                                    {{ \Carbon\Carbon::parse($requisition->created_at)->format('d M Y') }}
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
                <br>
                <div class="pagination-links">
                    {{ $requisitions->links() }}
                </div>
            </div>
        </div>
    </div>

</div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const monthlyTrendsLabels = {!! json_encode($monthlyTrendsLabels) !!};
    const monthlyTrendsData = {!! json_encode($monthlyTrendsData) !!};

    const dataset = Object.keys(monthlyTrendsData).map((itemName, index) => ({
        label: itemName,
        data: Object.values(monthlyTrendsData[itemName]),
        borderColor: `hsl(${index * 70}, 70%, 50%)`,
        backgroundColor: `hsla(${index * 70}, 70%, 50%, 0.5)`,
        fill: true,
    }));

    const ctx = document.getElementById('monthlyItemsChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: monthlyTrendsLabels,
            datasets: dataset
        },
        options: {
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>
    <!-- Chart.js library -->
   </x-app-layout>
