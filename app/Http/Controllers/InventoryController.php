<?php
namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InventoryController extends Controller
{
    // Display a listing of the inventory items
    public function index()
    {
        $inventories = Inventory::with('user')->paginate(10); // Get inventories with associated users
        return view('inventories.index', compact('inventories'));
    }

    // Show the form for creating a new inventory item
    public function create()
    {
        return view('inventories.create');
    }

    // Store a newly created inventory item in storage
    public function store(Request $request)
    {
        $request->validate([
            'item_name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'cost_per_item' => 'required|numeric',
        ]);

        Inventory::create([
            'user_id' => Auth::id(), // Associate the authenticated user
            'item_name' => $request->item_name,
            'quantity' => $request->quantity,
            'cost_per_item' => $request->cost_per_item,
            'total_value' => $request->quantity * $request->cost_per_item,
        ]);

        return redirect()->route('inventories.index')->with('success', 'Item added to inventory successfully.');
    }

    // Show the form for editing the specified inventory item
    public function edit(Inventory $inventory)
    {
        return view('inventories.edit', compact('inventory'));
    }

    // Update the specified inventory item in storage
    public function update(Request $request, Inventory $inventory)
    {
        $request->validate([
            'item_name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'cost_per_item' => 'required|numeric',
        ]);

        $inventory->update([
            'item_name' => $request->item_name,
            'quantity' => $request->quantity,
            'cost_per_item' => $request->cost_per_item,
            'total_value' => $request->quantity * $request->cost_per_item,
        ]);

        return redirect()->route('inventories.index')->with('success', 'Item updated successfully.');
    }

    // Remove the specified inventory item from storage
    public function destroy(Inventory $inventory)
    {
        $inventory->delete();
        return redirect()->route('inventories.index')->with('success', 'Item deleted successfully.');
    }
}
