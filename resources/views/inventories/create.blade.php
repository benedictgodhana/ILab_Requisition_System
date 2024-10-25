<x-app-layout>
    <div class="p-6">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-semibold mb-4">Create New Inventory Item</h2>

            <form action="{{ route('inventories.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="item_name" class="block text-sm font-medium text-gray-700">Item Name</label>
                    <input type="text" name="item_name" id="item_name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <div class="mb-4">
                    <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                    <input type="number" name="quantity" id="quantity" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" min="0" value="0" required oninput="calculateTotal()">
                </div>

                <div class="mb-4">
                    <label for="cost_per_item" class="block text-sm font-medium text-gray-700">Cost Per Item</label>
                    <input type="number" step="0.01" name="cost_per_item" id="cost_per_item" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required oninput="calculateTotal()">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Total Value</label>
                    <input type="text" id="total_value" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm bg-gray-100" readonly>
                </div>

                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Create Inventory Item</button>
            </form>
        </div>
    </div>

    <script>
        function calculateTotal() {
            const quantity = document.getElementById('quantity').value;
            const costPerItem = document.getElementById('cost_per_item').value;
            const totalValue = quantity * costPerItem;

            document.getElementById('total_value').value = totalValue.toFixed(2); // Format to two decimal places
        }
    </script>
</x-app-layout>
