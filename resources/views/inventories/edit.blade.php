<x-app-layout>
    <div class="p-6">
        @if (session('success'))
            <div id="success-message" class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-semibold mb-4">Edit Inventory Item</h2>

            <form action="{{ route('inventories.update', $inventory->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="item_name" class="block text-sm font-medium text-gray-700">Item Name</label>
                    <input type="text" name="item_name" id="item_name" value="{{ old('item_name', $inventory->item_name) }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <div class="mb-4">
                    <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                    <input type="number" name="quantity" id="quantity" value="{{ old('quantity', $inventory->quantity) }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" min="0" required>
                </div>

                <div class="mb-4">
                    <label for="cost_per_item" class="block text-sm font-medium text-gray-700">Cost Per Item</label>
                    <input type="number" step="0.01" name="cost_per_item" id="cost_per_item" value="{{ old('cost_per_item', $inventory->cost_per_item) }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <div class="mb-4">
                    <label for="total_value" class="block text-sm font-medium text-gray-700">Total Value</label>
                    <input type="text" name="total_value" id="total_value" value="Ksh.{{ number_format($inventory->total_value, 2) }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" disabled>
                </div>

                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Update Inventory Item</button>
            </form>
        </div>
    </div>
</x-app-layout>
