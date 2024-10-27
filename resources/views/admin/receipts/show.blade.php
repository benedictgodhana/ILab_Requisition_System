<x-layouts.admin-layout title="Receipt Details">

<div class="h-screen flex flex-col">
    <div class="flex-1 overflow-y-auto max-h-full p-6">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Receipt Details</h2>

            <div class="mb-4">
                <strong class="text-gray-600">Item:</strong>
                <span class="text-lg font-semibold text-gray-800">{{ $receipt->item->name }}</span>
            </div>

            <div class="mb-4">
                <strong class="text-gray-600">Quantity:</strong>
                <span class="text-lg font-semibold text-gray-800">{{ $receipt->quantity }}</span>
            </div>

            <div class="mb-4">
                <strong class="text-gray-600">Cost Per Item:</strong>
                <span class="text-lg font-semibold text-gray-800">Ksh.{{ number_format($receipt->cost_per_item, 2) }}</span>
            </div>

            <div class="mb-4">
                <strong class="text-gray-600">Total Cost:</strong>
                <span class="text-lg font-semibold text-gray-800">Ksh.{{ number_format($receipt->total_cost, 2) }}</span>
            </div>

            <div class="mb-4">
                <strong class="text-gray-600">Added By:</strong>
                <span class="text-lg font-semibold text-gray-800">{{ $receipt->user->name }}</span>
            </div>

            <div class="mb-4">
                <strong class="text-gray-600">Created At:</strong>
                <span class="text-lg font-semibold text-gray-800">{{ $receipt->created_at->format('Y-m-d H:i:s') }}</span>
            </div>

            <div class="mt-6">
                <a href="{{ route('receipts.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">
                    <i class="fa fa-arrow-left mr-1"></i> Back to Receipts
                </a>
            </div>
        </div>
    </div>
</div>

</x-layouts.admin-layout>
