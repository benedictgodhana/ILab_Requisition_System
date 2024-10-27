<x-layouts.super-admin-layout title="Edit Department">

<div class="h-screen flex flex-col">
    <div class="flex-1 overflow-y-auto max-h-full p-6">
        <div class="bg-white shadow-md rounded-lg p-6">

            @if (session('success'))
                <div id="successAlert" class="bg-green-500 text-white p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <h2 class="text-2xl font-bold mb-4">Edit Department</h2>

            <form action="{{ route('departments.update', $department->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $department->name) }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                    @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="4"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('description', $department->description) }}</textarea>
                    @error('description')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex justify-end space-x-2">
                    <a href="{{ route('departments.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">Cancel</a>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    // Hide success alert after 3 seconds
    setTimeout(function() {
        document.getElementById('successAlert')?.fadeOut();
    }, 3000);
</script>

</x-layouts.super-admin-layout>

