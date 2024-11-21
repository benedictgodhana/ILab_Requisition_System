<x-layouts.admin-layout title="Admin Dashboard">
    <div class="p-4">
        @if (session('success'))
            <div id="success-message" class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-semibold mb-4">My Requisitions</h2>

            <!-- Search and Filter Form -->
            <form method="GET" action="{{ route('requisition.index') }}" class="mb-4 space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <!-- Search Input -->
                    <div>
                        <label for="search" class="block text-sm font-medium text-gray-700">Search</label>
                        <input
                            type="text"
                            name="search"
                            id="search"
                            value="{{ request('search') }}"
                            placeholder="Order Number or User"
                            class="px-4 py-2 border rounded-md w-full"
                        />
                    </div>

                    <!-- Status Filter -->
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                        <select name="status" id="status" class="px-4 py-2 border rounded-md w-full">
                            <option value="">All Status</option>
                            <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="Approved" {{ request('status') == 'Approved' ? 'selected' : '' }}>Approved</option>
                            <option value="Rejected" {{ request('status') == 'Rejected' ? 'selected' : '' }}>Rejected</option>
                        </select>
                    </div>

                    <!-- Date From -->
                    <div>
                        <label for="date_from" class="block text-sm font-medium text-gray-700">Date From</label>
                        <input
                            type="date"
                            name="date_from"
                            id="date_from"
                            value="{{ request('date_from') }}"
                            class="px-4 py-2 border rounded-md w-full"
                        />
                    </div>

                    <!-- Date To -->
                    <div>
                        <label for="date_to" class="block text-sm font-medium text-gray-700">Date To</label>
                        <input
                            type="date"
                            name="date_to"
                            id="date_to"
                            value="{{ request('date_to') }}"
                            class="px-4 py-2 border rounded-md w-full"
                        />
                    </div>
                </div>

                <div class="flex justify-end mt-4 space-x-4">
                    <!-- Filter Button -->
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">
                        Filter
                    </button>

                    <!-- Reset Button -->
                    <a href="{{ route('requisition.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md">
                        Reset
                    </a>

                    <!-- Print Button -->
                    <button type="button" onclick="window.print()" class="px-4 py-2 bg-green-500 text-white rounded-md">
                        Print
                    </button>

                    <!-- Export Button -->
                    <a href="" class="px-4 py-2 bg-indigo-500 text-white rounded-md">
                        Export
                    </a>
                </div>
            </form>

            <!-- Requisitions Table -->
            <div class="overflow-x-auto mt-4">
                <table class="min-w-full bg-white border rounded-lg">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3">Date</th>
                            <th class="px-6 py-3">Order Number</th>
                            <th class="px-6 py-3">Items Count</th>
                            <th class="px-6 py-3">Requested by</th>
                            <th class="px-6 py-3">Updated By</th>
                            <th class="px-6 py-3">Status</th>
                            <th class="px-6 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($requisitions as $requisition)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">{{ $requisition->created_at->format('d M Y, h:i A') }}</td>
                                <td class="px-6 py-4">{{ $requisition->order_number }}</td>
                                <td class="px-6 py-4">{{ $requisition->orderItems->count() }} item(s)</td>
                                <td class="px-6 py-4">{{ $requisition->user->name }}</td>
                                <td class="px-6 py-4">{{ $requisition->updatedBy->name ?? 'Not Updated' }}</td>
                                <td class="px-6 py-4">{{ $requisition->status->name }}</td>
                                <td class="px-6 py-4 space-x-2">
                                    <a href="{{ route('requisition.view', $requisition->id) }}"
                                       class="px-4 py-2 bg-blue-500 text-white rounded-md">View</a>
                                    <a href="{{ route('requisition.edit', $requisition->id) }}"
                                       class="px-4 py-2 bg-yellow-500 text-white rounded-md">Edit</a>
                                    <form action="{{ route('requisitions.destroy', $requisition->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $requisitions->links() }}
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin-layout>
s
