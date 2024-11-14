
<x-layouts.admin-layout title="Admin Dashboard">


@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="p-8  max-w-8xl mx-auto bg-white shadow-lg rounded-lg">
        <h2 class="text-2xl font-semibold mb-6 text-blue-600">Edit Requisition</h2>

        <form action="{{ route('updaterequisitions', $requisition->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-2 gap-6 mb-6">
                <!-- Order Number -->
                <div>
                    <strong class="block text-gray-600">Order Number:</strong>
                    <span class="text-lg font-medium">{{ $requisition->order_number }}</span>
                </div>

                <div>
                    <strong class="block text-gray-600">Order Number:</strong>
                    <span class="text-lg font-medium">{{ $requisition->user->name }}</span>
                </div>

                <!-- Status (Read-Only) -->
               <!-- Status (Dropdown for Updating) -->
<div class="">
    <label for="status" class="block text-gray-600 font-semibold">Status:</label>
    <select name="status" id="status" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
        @foreach ($statuses as $status)
            <option value="{{ $status->id }}" {{ $requisition->status_id == $status->id ? 'selected' : '' }}>
                {{ $status->name }}
            </option>
        @endforeach
    </select>
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
                    <input type="date" name="date_needed" value="{{ \Carbon\Carbon::parse($requisition->date_needed)->format('Y-m-d') }}"
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required>
                </div>
            </div>

            <!-- Remarks -->
            <div class="">
                <strong class="block text-gray-600 mb-2">Remarks:</strong>
                <textarea name="remarks" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">{{ $requisition->remarks }}</textarea>
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
                            <th class="px-4 py-2 text-left font-medium text-gray-600">Action</th>

                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @php $grandTotal = 0; @endphp
                        @foreach ($requisition->orderItems as $orderItem)
                            @php
                                $itemTotal = $orderItem->quantity * $orderItem->cost;
                                $grandTotal += $itemTotal;
                            @endphp
                            <tr>
                                <td class="px-4 py-2">{{ $orderItem->item->name }}</td>
                                <td class="px-4 py-2">
                                    <input type="number" name="items[{{ $orderItem->id }}][quantity]"
                                           value="{{ $orderItem->quantity }}"
                                           class="w-20 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 quantity-field"
                                           data-cost="{{ $orderItem->cost }}"
                                           data-item-id="{{ $orderItem->id }}"
                                           onchange="updateTotal({{ $orderItem->id }})" required>
                                </td>
                                <td class="px-4 py-2">{{ number_format($orderItem->cost, 2) }}</td>
                                <td class="px-4 py-2">
                                    <span id="total-{{ $orderItem->id }}">{{ number_format($itemTotal, 2) }}</span>
                                </td>

                                <td class="px-4 py-2">
                                    <button type="button" class="px-2 py-1 bg-red-500 text-white rounded-md hover:bg-red-600"
                                            onclick="removeItem({{ $orderItem->id }})">Remove</button>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Grand Total -->
            <div class="mb-6 text-right">
                <strong class="text-lg font-semibold text-gray-800">Grand Total: KES <span id="grand-total">{{ number_format($grandTotal, 2) }}</span></strong>
            </div>

            <div class="flex items-center justify-between">


              <!-- Save Changes Button -->
<div class="mt-6">
    <button type="submit" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-md">
        Save Changes
    </button>
</div>


                <a href="{{ route('staff.dashboard') }}" class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-md">
                    Back to List
                </a>
            </div>
        </form>
    </div>

    <script>
        function updateTotal(itemId) {
            const quantityField = document.querySelector(`input[data-item-id="${itemId}"]`);
            const cost = parseFloat(quantityField.getAttribute('data-cost'));
            const quantity = parseInt(quantityField.value) || 0;
            const totalElement = document.getElementById(`total-${itemId}`);
            const newTotal = quantity * cost;

            // Update the item's total
            totalElement.textContent = newTotal.toFixed(2);

            // Recalculate the grand total
            updateGrandTotal();
        }

        function updateGrandTotal() {
            let grandTotal = 0;
            document.querySelectorAll('.quantity-field').forEach(field => {
                const cost = parseFloat(field.getAttribute('data-cost'));
                const quantity = parseInt(field.value) || 0;
                grandTotal += (quantity * cost);
            });

            // Update the grand total display
            document.getElementById('grand-total').textContent = grandTotal.toFixed(2);
        }

        function removeItem(itemId) {
            alert(`Removing item with ID: ${itemId}`);
            // Implement the logic to remove the item (e.g., AJAX or form submission)
        }
    </script>
</x-layouts.admin-layout>
