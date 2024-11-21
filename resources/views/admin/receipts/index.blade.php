<x-layouts.admin-layout title="Item Receipts">

<div class="h-screen flex flex-col">
    <div class="flex-1 overflow-y-auto max-h-full p-6">
        <div class="bg-white shadow-md rounded-lg p-6">

            @if(session('success'))
                <div id="successAlert" class="bg-green-500 text-white p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold">Item Receipts</h2>
                <a href="{{ route('receipts.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">Add Receipt</a>
            </div>

            <!-- Search and Filter Form -->
            <form method="GET" action="{{ route('receipts.index') }}" class="mb-4">
                <div class="grid grid-cols-4 gap-4">
                    <!-- Search by Item Name -->
                    <div>
                        <label for="search" class="block text-sm font-medium text-gray-700">Search</label>
                        <input type="text" name="search" id="search" value="{{ request('search') }}" placeholder="Search by Item Name" class="mt-1 block w-full border border-gray-300 rounded-lg py-2 px-3 shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <!-- Filter by User -->
                    <div>
                        <label for="user" class="block text-sm font-medium text-gray-700">Filter by User</label>
                        <select name="user" id="user" class="mt-1 block w-full border border-gray-300 rounded-lg py-2 px-3 shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            <option value="">All Users</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ request('user') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Filter by Date -->
                    <div>
                        <label for="date" class="block text-sm font-medium text-gray-700">Filter by Date</label>
                        <input type="date" name="date" id="date" value="{{ request('date') }}" class="mt-1 block w-full border border-gray-300 rounded-lg py-2 px-3 shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <!-- Submit Button -->
                    <div class="flex items-end">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition w-full">Apply Filters</button>
                    </div>
                </div>
            </form>

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200" id="receiptsTable">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b">Item Code</th>
                            <th class="py-2 px-4 border-b">Item Name</th>
                            <th class="py-2 px-4 border-b">Quantity</th>
                            <th class="py-2 px-4 border-b">Cost Per Item</th>
                            <th class="py-2 px-4 border-b">Total Cost</th>
                            <th class="py-2 px-4 border-b">Added By</th>
                            <th class="py-2 px-4 border-b">Created At</th>
                            <th class="py-2 px-4 border-b">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($receipts as $receipt)
                            <tr class="text-center">
                                <td class="py-2 px-4 border-b">{{ $receipt->item->unique_code }}</td>
                                <td class="py-2 px-4 border-b">{{ $receipt->item->name ?? 'N/A' }}</td>
                                <td class="py-2 px-4 border-b">{{ $receipt->quantity }}</td>
                                <td class="py-2 px-4 border-b">{{ number_format($receipt->cost_per_item, 2) }}</td>
                                <td class="py-2 px-4 border-b">{{ number_format($receipt->total_cost, 2) }}</td>
                                <td class="py-2 px-4 border-b">{{ $receipt->user->name }}</td>
                                <td class="py-2 px-4 border-b">{{ $receipt->created_at->format('Y-m-d') }}</td>
                                <td class="py-2 px-4 border-b flex justify-center space-x-2">
                                    <a href="{{ route('receipts.show', $receipt->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded flex items-center hover:bg-blue-600 transition">
                                        <i class="fa fa-eye mr-1"></i> View
                                    </a>
                                    <a href="{{ route('receipts.edit', $receipt->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded flex items-center hover:bg-yellow-600 transition">
                                        <i class="fa fa-pencil-alt mr-1"></i> Edit
                                    </a>
                                    <form action="{{ route('receipts.destroy', $receipt->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded flex items-center hover:bg-red-600 transition">
                                            <i class="fa fa-trash mr-1"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                {{ $receipts->links() }}
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        setTimeout(function() {
            $('#successAlert').fadeOut();
        }, 3000);
    });
</script>

</x-layouts.admin-layout>
