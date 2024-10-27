<?php

namespace App\Http\Controllers;

use App\Models\Receipt; // Make sure to import your Receipt model
use App\Models\Item; // Import the Item model if needed
use App\Models\ItemReceipt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReceiptController extends Controller
{
    // Display a listing of the receipts
    public function index()
    {
        $receipts = ItemReceipt::with(['item', 'user'])->get(); // Eager load item and user relationships
        return view('admin.receipts.index', compact('receipts'));
    }

    // Show the form for creating a new receipt
    public function create()
    {
        $items = Item::all(); // Fetch all items for the dropdown
        return view('admin.receipts.create', compact('items'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'quantity' => 'required|integer|min:1',
            'cost_per_item' => 'required|numeric',
        ]);

        // Calculate total cost
        $totalCost = $request->quantity * $request->cost_per_item;

        // Create the receipt
        ItemReceipt::create([
            'item_id' => $request->item_id,
            'quantity' => $request->quantity,
            'cost_per_item' => $request->cost_per_item,
            'total_cost' => $totalCost, // Use the calculated total cost
            'user_id' => Auth::id(), // Store the user who created the receipt
        ]);

        return redirect()->route('receipts.index')->with('success', 'Receipt created successfully.');
    }
    // Display the specified receipt
    public function show(ItemReceipt $receipt)
    {
        return view('admin.receipts.show', compact('receipt'));
    }

    // Show the form for editing the specified receipt
    public function edit(ItemReceipt $receipt)
    {
        $items = Item::all(); // Fetch all items for the dropdown
        return view('admin.receipts.edit', compact('receipt', 'items'));
    }

    // Update the specified receipt in storage
    public function update(Request $request, ItemReceipt $receipt)
    {
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'quantity' => 'required|integer|min:1',
            'cost_per_item' => 'required|numeric',

        ]);

        $totalCost = $request->quantity * $request->cost_per_item;

        $receipt->update([
            'item_id' => $request->item_id,
            'quantity' => $request->quantity,
            'cost_per_item' => $request->cost_per_item,
            'total_cost' => $totalCost, // Use the calculated total cost


        ]);

        return redirect()->route('receipts.index')->with('success', 'Receipt updated successfully.');
    }

    // Remove the specified receipt from storage
    public function destroy(ItemReceipt $receipt)
    {
        $receipt->delete();

        return redirect()->route('receipts.index')->with('success', 'Receipt deleted successfully.');
    }
}
