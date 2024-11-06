<x-app-layout>
    <div class="p-8 max-w-8xl mx-auto bg-white shadow-lg rounded-lg">
        <h2 class="text-3xl font-semibold mb-6 text-blue-600">Requisition Details</h2>

        <div class="grid grid-cols-2 gap-6 mb-6">
            <!-- Order Number -->
            <div>
                <strong class="block text-gray-600">Order Number:</strong>
                <span class="text-lg font-medium">{{ $requisition->order_number }}</span>
            </div>

            <!-- Status -->
            <div>
                <strong class="block text-gray-600">Status:</strong>
                <span class="inline-block px-3 py-1 rounded-full text-sm
                    @if ($requisition->status->name === 'Approved') bg-green-100 text-green-800
                    @elseif ($requisition->status->name === 'Pending') bg-yellow-100 text-yellow-800
                    @else bg-red-100 text-red-800 @endif">
                    {{ $requisition->status->name }}
                </span>
            </div>

            <!-- Created On -->
            <div>
                <strong class="block text-gray-600">Created On:</strong>
                <span class="text-lg">
                    {{ \Carbon\Carbon::parse($requisition->created_at)->format('d M Y, h:i A') }}
                </span>
            </div>

            <!-- Date Needed -->
            <div>
                <strong class="block text-gray-600">Date Needed:</strong>
                <span class="text-lg">
                    {{ \Carbon\Carbon::parse($requisition->date_needed)->format('d M Y') }}
                </span>
            </div>
        </div>

        <!-- Remarks -->
        <div class="mb-6">
            <strong class="block text-gray-600 mb-2">Remarks:</strong>
            <p class="bg-gray-50 p-4 rounded-lg text-gray-700">{{ $requisition->remarks }}</p>
        </div>

        <!-- Items List -->
        <div class="mb-6">
            <h3 class="text-lg font-semibold mb-4 text-blue-500">Ordered Items</h3>
            <table class="min-w-full border rounded-lg overflow-hidden">
                <thead class="bg-blue-100">
                    <tr>
                        <th class="px-4 py-2 text-left font-medium text-gray-600">Item Name</th>
                        <th class="px-4 py-2 text-left font-medium text-gray-600">Quantity</th>
                        <th class="px-4 py-2 text-left font-medium text-gray-600">Cost (KES)</th>
                        <th class="px-4 py-2 text-left font-medium text-gray-600">Total (KES)</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @php
                        $grandTotal = 0;
                    @endphp
                    @foreach ($requisition->orderItems as $orderItem)
                        @php
                            $totalCost = $orderItem->quantity * $orderItem->cost;
                            $grandTotal += $totalCost;
                        @endphp
                        <tr>
                            <td class="px-4 py-2">{{ $orderItem->item->name }}</td>
                            <td class="px-4 py-2">{{ $orderItem->quantity }}</td>
                            <td class="px-4 py-2">{{ number_format($orderItem->cost, 2) }}</td>
                            <td class="px-4 py-2">{{ number_format($totalCost, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Grand Total -->
        <div class="mb-6 text-right">
            <strong class="text-lg font-semibold text-gray-800">Grand Total: KES {{ number_format($grandTotal, 2) }}</strong>
        </div>

        <!-- Back Button -->
        <div class="mt-8">
            <a href="{{ route('requisitions.index') }}"
               class="px-6 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-md inline-block">
                Back to List
            </a>
        </div>
    </div>
</x-app-layout>
