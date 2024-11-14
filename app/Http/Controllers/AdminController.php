<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemQuantity;
use App\Models\ItemReceipt;
use App\Models\OrderHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    // Show the admin dashboard
    public function dashboard()
    { // Get the total requisitions for all users
        $totalRequisitions = OrderHeader::count();

        // Get the total approved requisitions for all users
        $totalApproved = OrderHeader::whereHas('status', function($query) {
                                    $query->where('name', 'approved');
                                })
                                ->count();

        // Get the total rejected requisitions for all users
        $totalRejected = OrderHeader::whereHas('status', function($query) {
                                    $query->where('name', 'rejected');
                                })
                                ->count();

        // Get the total pending requisitions for all users
        $totalPending = OrderHeader::whereHas('status', function($query) {
                                    $query->where('name', 'pending');
                                })
                                ->count();

        // Get the requisition trends (count of requisitions per month for all users)
        $monthlyTrends = OrderHeader::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as order_count')
                                    ->groupBy('year', 'month')
                                    ->orderByDesc('year')
                                    ->orderByDesc('month')
                                    ->get();

        // Initialize an array to store the monthly labels and data
        $monthlyTrendsLabels = [];
        $monthlyTrendsData = [];

        foreach ($monthlyTrends as $trend) {
            $monthlyTrendsLabels[] = $trend->month . '/' . $trend->year; // E.g., 12/2024
            $monthlyTrendsData[] = $trend->order_count;
        }

        // Fetch the requisitions for all users with pagination
        $requisitions = OrderHeader::with('orderItems')
            ->orderByDesc('created_at') // Order by creation date (most recent first)
            ->paginate(5); // Paginate with 5 items per page

        // Fetch the most recent requisitions (optional - limit to 5 for display)
        $recentRequisitions = OrderHeader::with('orderItems')
            ->orderByDesc('created_at') // Order by creation date (most recent first)
            ->limit(5) // Limit to the 5 most recent requisitions
            ->get();

        // Get the most requested item for the current month across all users
        $topRequestedCurrentMonth = OrderHeader::join('order_item', 'order_item.order_id', '=', 'order_headers.id')
            ->select(DB::raw('MONTH(order_headers.created_at) as month'), 'order_item.item_id', DB::raw('count(*) as count'))
            ->whereRaw('MONTH(order_headers.created_at) = ?', [now()->month])
            ->groupBy('month', 'order_item.item_id')
            ->orderByDesc('count')
            ->first(); // Get only the top requested item for this month

        // Get the most requested item for the previous month across all users
        $topRequestedPreviousMonth = OrderHeader::join('order_item', 'order_item.order_id', '=', 'order_headers.id')
            ->select(DB::raw('MONTH(order_headers.created_at) as month'), 'order_item.item_id', DB::raw('count(*) as count'))
            ->whereRaw('MONTH(order_headers.created_at) = ?', [now()->subMonth()->month])
            ->groupBy('month', 'order_item.item_id')
            ->orderByDesc('count')
            ->first(); // Get only the top requested item for last month

        // Get item names (assuming Item model exists and has a 'name' field)
        $topRequestedCurrentItemName = Item::find($topRequestedCurrentMonth->item_id)->name ?? 'Unknown Item';
        $topRequestedPreviousItemName = Item::find($topRequestedPreviousMonth->item_id)->name ?? 'Unknown Item';

        // Pass the data to the view
        return view('admin.dashboard', [
            'totalRequisitions' => $totalRequisitions,
            'totalApproved' => $totalApproved,
            'totalRejected' => $totalRejected,
            'totalPending' => $totalPending,
            'monthlyTrends' => $monthlyTrends,
            'monthlyTrendsLabels' => $monthlyTrendsLabels,
            'monthlyTrendsData' => $monthlyTrendsData,
            'requisitions' => $requisitions,
            'recentRequisitions' => $recentRequisitions, // Add recently created requisitions
            'topRequestedCurrentItem' => $topRequestedCurrentItemName,
            'topRequestedCurrentCount' => $topRequestedCurrentMonth->count ?? 0,
            'topRequestedPreviousItem' => $topRequestedPreviousItemName,
            'topRequestedPreviousCount' => $topRequestedPreviousMonth->count ?? 0,
        ]);

    }

    // Show all items
    public function index()
    {
        $items = Item::all();
        return view('admin.items.index', compact('items'));
    }


    public function requisitions()
    {
        // Fetch requisitions with related order items and paginate, ordered by created_at descending
        $requisitions = OrderHeader::with('orderItems') // Load related order items
            ->orderBy('created_at', 'desc') // Order by created_at in descending order (most recent first)
            ->paginate(8); // Paginate results, 8 requisitions per page

        // Pass the requisitions to the view
        return view('admin.requisition.index', compact('requisitions'));
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
