<x-layouts.admin-layout title="Item Details">

<div class="h-screen flex flex-col">
    <div class="flex-1 overflow-y-auto max-h-full p-6">
        <div class="bg-white shadow-md rounded-lg p-8">
            <h2 class="text-2xl font-bold mb-6 text-gray-800 border-b pb-2">Item Details</h2>

            <div class="mb-4 space-y-2">
                <div>
                    <strong class="text-gray-700">Item Name:</strong>
                    <span class="ml-2 text-gray-600">{{ $item->name }}</span>
                </div>
                <div>
                    <strong class="text-gray-700">Description:</strong>
                    <span class="ml-2 text-gray-600">{{ $item->description }}</span>
                </div>
                <div>
                    <strong class="text-gray-700">Manufacturer Code:</strong>
                    <span class="ml-2 text-gray-600">{{ $item->manufacturer_code }}</span>
                </div>
                <div>
                    <strong class="text-gray-700">Reorder Level:</strong>
                    <span class="ml-2 text-gray-600">{{ $item->reorder_level }}</span>
                </div>
                <div>
                    <strong class="text-gray-700">Created At:</strong>
                    <span class="ml-2 text-gray-600">{{ $item->created_at->format('Y-m-d H:i:s') }}</span>
                </div>
                <div>
                    <strong class="text-gray-700">Updated At:</strong>
                    <span class="ml-2 text-gray-600">{{ $item->updated_at->format('Y-m-d H:i:s') }}</span>
                </div>
            </div>

            <div class="mt-6 flex space-x-4">
                <a href="{{ route('items.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition duration-200">Back to Items</a>
                <a href="{{ route('items.edit', $item->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-200">Edit Item</a>
            </div>
        </div>
    </div>
</div>

</x-layouts.admin-layout>
