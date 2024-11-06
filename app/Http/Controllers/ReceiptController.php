<?php

namespace App\Http\Controllers;

use App\Models\Receipt; // Make sure to import your Receipt model
use App\Models\Item; // Import the Item model if needed
use App\Models\ItemQuantity;
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

        // Update the quantity in the ItemQuantity table
        $itemQuantity = ItemQuantity::where('item_id', $request->item_id)->first();
        if ($itemQuantity) {
            $itemQuantity->quantity += $request->quantity; // Increment the existing quantity
            $itemQuantity->save(); // Save the updated quantity
        } else {
            // Handle case where the item does not exist in ItemQuantity table
            ItemQuantity::create([
                'item_id' => $request->item_id,
                'quantity' => $request->quantity // Initialize with the current quantity
            ]);
        }

        return redirect()->route('receipts.index')->with('success', 'Receipt created successfully and stock updated.');
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
        // Validate the incoming request
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'quantity' => 'required|integer|min:1',
            'cost_per_item' => 'required|numeric',
        ]);

        // Calculate the total cost based on the new quantity
        $totalCost = $request->quantity * $request->cost_per_item;

        // Get the current quantity from the existing receipt
        $currentQuantity = $receipt->quantity;

        // Update the receipt
        $receipt->update([
            'item_id' => $request->item_id,
            'quantity' => $request->quantity,
            'cost_per_item' => $request->cost_per_item,
            'total_cost' => $totalCost, // Use the calculated total cost
        ]);

        // Update the ItemQuantity table
        $itemQuantity = ItemQuantity::where('item_id', $request->item_id)->first();

        if ($itemQuantity) {
            // Adjust the quantity in the ItemQuantity table
            // Deduct the old quantity and add the new quantity
            $itemQuantity->quantity += ($request->quantity - $currentQuantity);
            $itemQuantity->save(); // Save the updated quantity
        }

        return redirect()->route('receipts.index')->with('success', 'Receipt updated successfully and stock adjusted.');
    }


    // Remove the specified receipt from storage
    public function destroy(ItemReceipt $receipt)
    {
        $receipt->delete();

        return redirect()->route('receipts.index')->with('success', 'Receipt deleted successfully.');
    }
}
