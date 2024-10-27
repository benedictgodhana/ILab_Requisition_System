<x-layouts.admin-layout title="Add Item Receipt">

<div class="h-screen flex flex-col">
    <div class="flex-1 overflow-y-auto max-h-full p-6">
        <div class="bg-white shadow-md rounded-lg p-6">

            <h2 class="text-2xl font-bold mb-4">Add Item Receipt</h2>

            <form action="{{ route('receipts.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="item_id" class="block text-gray-700">Select Item:</label>
                    <select id="item_id" name="item_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" onchange="updateCost()">
                        @foreach($items as $item)
                            <option value="{{ $item->id }}" data-cost="{{ $item->cost }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="quantity" class="block text-gray-700">Quantity:</label>
                    <input type="number" id="quantity" name="quantity" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" oninput="updateCost()">
                </div>

                <div class="mb-4">
                    <label for="cost_per_item" class="block text-gray-700">Cost Per Item:</label>
                    <input type="text" id="cost_per_item" name="cost_per_item" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" >
                </div>

                <div class="mb-4">
                    <label for="total_cost" class="block text-gray-700">Total Cost:</label>
                    <input type="text" id="total_cost" name="total_cost" readonly class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                </div>

                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">Create Receipt</button>
                    <a href="{{ route('receipts.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">Cancel</a>
                </div>
            </form>

        </div>
    </div>
</div>

<script>
    function updateCost() {
        const itemSelect = document.getElementById('item_id');
        const selectedOption = itemSelect.options[itemSelect.selectedIndex];

        const costPerItem = parseFloat(selectedOption.getAttribute('data-cost')) || 0; // Get cost from selected item
        const quantity = parseInt(document.getElementById('quantity').value) || 0; // Get quantity input

        // Update the cost per item and total cost inputs
        document.getElementById('cost_per_item').value = costPerItem.toFixed(2); // Format cost per item
        document.getElementById('total_cost').value = (costPerItem * quantity).toFixed(2); // Calculate and format total cost
    }

    // Initialize costs on page load
    document.addEventListener('DOMContentLoaded', updateCost);
</script>

</x-layouts.admin-layout>
