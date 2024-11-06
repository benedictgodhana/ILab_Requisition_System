<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemQuantity;
use App\Models\ItemReceipt;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Show the admin dashboard
    public function dashboard()
    {
        $itemsCount = Item::count();
        $receiptsCount = ItemReceipt::count();

        return view('admin.dashboard', compact('itemsCount', 'receiptsCount'));
    }

    // Show all items
    public function index()
    {
        $items = Item::all();
        return view('admin.items.index', compact('items'));
    }

    // Show the form for creating a new item
    public function create()
    {
        return view('admin.items.create');
    }

    // Store a newly created item in storage
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'reorder_level' => 'required|integer|min:0',
        'manufacturer_code' => 'nullable|string',
    ]);

    // Create the item
    $item = Item::create([
        'name' => $request->name,
        'description' => $request->description,
        'unique_code' => $this->generateUniqueCode(), // Generate unique code on create
        'reorder_level' => $request->reorder_level,
        'manufacturer_code' => $request->manufacturer_code,
        'user_id' => auth()->id(), // Store the user who added the item
    ]);

    // Create the ItemQuantity entry with quantity set to 0
    ItemQuantity::create([
        'item_id' => $item->id, // Foreign key to the item
        'quantity' => 0, // Default quantity
    ]);

    return redirect()->route('items.index')->with('success', 'Item created successfully.');
}


    // Show a specific item
    public function show(Item $item)
    {
        return view('admin.items.show', compact('item'));
    }

    // Show the form for editing a specific item
    public function edit(Item $item)
    {
        return view('admin.items.edit', compact('item'));
    }

    // Update a specific item in storage
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'reorder_level' => 'required|integer|min:0',
            'manufacturer_code' => 'nullable|string',
        ]);

        // Generate a new unique code for the item
        $item->unique_code = $this->generateUniqueCode();

        // Update the item with the new values excluding unique_code since it is already set
        $item->update($request->except('unique_code'));

        return redirect()->route('items.index')->with('success', 'Item updated successfully.');
    }

    // Remove a specific item from storage
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('items.index')->with('success', 'Item deleted successfully.');
    }

    // Function to generate a unique code
    private function generateUniqueCode()
    {
        // Here, I'm using a simple approach to generate a unique code
        // This can be customized based on your needs
        return 'CODE-' . strtoupper(uniqid());
    }
}
