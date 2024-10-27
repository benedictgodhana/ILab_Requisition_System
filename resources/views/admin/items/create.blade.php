<x-layouts.admin-layout title="Add New Item">

<div class="h-screen flex flex-col">
    <div class="flex-1 overflow-y-auto max-h-full p-6">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-bold mb-4">Add New Item</h2>

            <form action="{{ route('items.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Item Name</label>
                    <input type="text" id="name" name="name" class="mt-1 block w-full border-gray-300 rounded-md focus:border-blue-500 focus:ring focus:ring-blue-500" required>
                    @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-gray-700">Description</label>
                    <textarea id="description" name="description" class="mt-1 block w-full border-gray-300 rounded-md focus:border-blue-500 focus:ring focus:ring-blue-500" rows="4"></textarea>
                    @error('description')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

               
                <div class="mb-4">
                    <label for="manufacturer_code" class="block text-gray-700">Manufacturer Code</label>
                    <input type="text" id="manufacturer_code" name="manufacturer_code" class="mt-1 block w-full border-gray-300 rounded-md focus:border-blue-500 focus:ring focus:ring-blue-500">
                    @error('manufacturer_code')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="reorder_level" class="block text-gray-700">Reorder Level</label>
                    <input type="number" min="0" id="reorder_level" name="reorder_level" class="mt-1 block w-full border-gray-300 rounded-md focus:border-blue-500 focus:ring focus:ring-blue-500" required>
                    @error('reorder_level')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>



                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">Add Item</button>
                </div>
            </form>
        </div>
    </div>
</div>

</x-layouts.admin-layout>
