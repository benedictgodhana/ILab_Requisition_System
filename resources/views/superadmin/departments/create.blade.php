<!-- resources/views/departments/create.blade.php -->
<x-layouts.super-admin-layout title="Create Department">
    <div class="h-screen flex flex-col">
        <div class="flex-1 overflow-y-auto max-h-full p-6">
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-4">Create Department</h2>

                <form action="{{ route('departments.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="name" class="block font-medium text-gray-700">Department Name</label>
                        <input type="text" name="name" id="name" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block font-medium text-gray-700">Description</label>
                        <textarea name="description" id="description" rows="3"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                    </div>

                    <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">Create</button>
                    <a href="{{ route('departments.index') }}"
                        class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition ml-2">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</x-layouts.super-admin-layout>
