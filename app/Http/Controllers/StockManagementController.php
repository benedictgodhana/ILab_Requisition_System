<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemQuantity;
use Illuminate\Http\Request;

class StockManagementController extends Controller
{
    // Show the stock management page
    public function index()
    {
        // Get all items with their current quantities
        $items = ItemQuantity::all();

        return view('admin.stock.index', compact('items'));
    }

    // Show the form to update stock for a specific item
    public function edit($id)
    {
        $item = Item::with('quantity')->findOrFail($id);
        return view('stock.edit', compact('item'));
    }

    // Update stock quantity for an item
    public function update(Request $request, $id)
    {
        // Validate the incoming request
        $request->validate([
            'quantity' => 'required|integer|min:0',
        ]);

        // Find the item quantity record
        $itemQuantity = ItemQuantity::where('item_id', $id)->firstOrFail();

        // Update the stock quantity
        $itemQuantity->quantity = $request->quantity;
        $itemQuantity->save();

        return redirect()->route('stock.index')->with('success', 'Stock updated successfully!');
    }
}
