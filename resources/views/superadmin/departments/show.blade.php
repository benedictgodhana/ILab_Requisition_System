<x-layouts.super-admin-layout title="Department Details">

<div class="h-screen flex flex-col">
    <div class="flex-1 overflow-y-auto max-h-full p-6">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-bold mb-4">Department Details</h2>

            <div class="mb-4">
                <strong>Name:</strong> {{ $department->name }}<br>
                <strong>Description:</strong> {{ $department->description ?? 'N/A' }}<br>
                <strong>Created By:</strong> {{ $department->creator->name ?? 'Unknown' }}<br>
                <strong>Created At:</strong> {{ $department->created_at->format('Y-m-d H:i:s') }}<br>
                <strong>Last Updated By:</strong> {{ $department->updater->name ?? 'N/A' }}<br>
                <strong>Updated At:</strong> {{ $department->updated_at->format('Y-m-d H:i:s') }}
            </div>

            <div class="mt-6">
                <a href="{{ route('departments.index') }}"
                   class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">
                    Back to Departments
                </a>
                <a href="{{ route('departments.edit', $department->id) }}"
                   class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition ml-2">
                    Edit Department
                </a>
            </div>
        </div>
    </div>
</div>

</x-layouts.super-admin-layout>
