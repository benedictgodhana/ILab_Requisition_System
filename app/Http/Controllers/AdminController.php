<?php

namespace App\Http\Controllers;

use App\Exports\ItemsExport;
use App\Mail\ItemQuantityAssignedMail;
use App\Models\Item;
use App\Models\ItemQuantity;
use App\Models\ItemReceipt;
use App\Models\OrderHeader;
use App\Models\Status;
use App\Mail\RequisitionUpdatedMail;
use App\Mail\RestockNotificationMail;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

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
                                        $query->where('name', 'Declined');
                                    })
                                    ->count();

            // Get the total pending requisitions for all users
            $totalPending = OrderHeader::whereHas('status', function($query) {
                                        $query->where('name', 'Pending');
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

            // Get item names, ensuring no errors if the queries return null
            $topRequestedCurrentItemName = $topRequestedCurrentMonth ? Item::find($topRequestedCurrentMonth->item_id)->name : 'Unknown Item';
            $topRequestedPreviousItemName = $topRequestedPreviousMonth ? Item::find($topRequestedPreviousMonth->item_id)->name : 'Unknown Item';


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
    public function index(Request $request)
    {
        $query = Item::query();

        // Apply search filter
        if ($request->has('search') && !empty($request->search)) {
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('unique_code', 'like', '%' . $request->search . '%')
                ->orWhere('manufacturer_code', 'like', '%' . $request->search . '%');
        }

        // Apply filter by reorder level
        if ($request->has('reorder_level') && !empty($request->reorder_level)) {
            $query->where('reorder_level', '<=', $request->reorder_level);
        }

        // Paginate results
        $items = $query->paginate(10);

        return view('admin.items.index', compact('items'));
    }


    public function requisitions(Request $request)
    {
        $search = $request->input('search');
        $status = $request->input('status');
        $dateFrom = $request->input('date_from');
        $dateTo = $request->input('date_to');

        $query = OrderHeader::with(['orderItems', 'user', 'updatedBy', 'status']);

        if ($search) {
            $query->where('order_number', 'like', "%{$search}%")
                  ->orWhereHas('user', function ($query) use ($search) {
                      $query->where('name', 'like', "%{$search}%");
                  });
        }

        if ($status) {
            $query->whereHas('status', function ($query) use ($status) {
                $query->where('name', $status);
            });
        }

        if ($dateFrom) {
            $query->whereDate('created_at', '>=', $dateFrom);
        }

        if ($dateTo) {
            $query->whereDate('created_at', '<=', $dateTo);
        }

        $requisitions = $query->orderBy('created_at', 'desc')->paginate(6);

        return view('admin.requisition.index', compact('requisitions'));
    }


    public function view($id)
{
    $requisition = OrderHeader::with('orderItems')->findOrFail($id); // Fetch the requisition with its items
    return view('admin.requisition.view', compact('requisition'));
}

// Edit a specific requisition by ID
public function editrequisition($id)
{
    $requisition = OrderHeader::findOrFail($id); // Fetch the requisition
    $statuses = Status::all(); // Assuming you have a 'Status' model for the statuses table
    return view('admin.requisition.edit', compact('requisition','statuses'));
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

    public function approve(Request $request, $id)
{
    // Fetch the requisition and update the status to 'approved'
    $requisition = OrderHeader::findOrFail($id);
    $requisition->status = 'approved'; // Replace 'approved' with your actual status value or enum

    // If approval remarks are provided, update them
    if ($request->has('approval_remarks')) {
        $requisition->remarks = $request->input('approval_remarks');
    }

    $requisition->save();

    return redirect()->route('')->with('success', 'Requisition approved successfully.');
}

public function updateRequisition(Request $request, $id)
{
    $request->validate([
        'status' => 'required|exists:statuses,id', // Validate the status exists
        'items.*.remarks' => 'nullable|string', // Validate item remarks
    ]);

    // Fetch the requisition and update the status
    $requisition = OrderHeader::findOrFail($id);
    $requisition->status_id = $request->input('status');
    $requisition->updated_by = auth()->id(); // Track which user updated it
    $requisition->save();

    // Check if the status is "approved" to deduct quantities
    $status = Status::find($request->input('status'));
    if ($status && strtolower($status->name) === 'approved') {
        foreach ($requisition->orderItems as $orderItem) {
            $itemQuantity = ItemQuantity::where('item_id', $orderItem->item_id)->first();

            if ($itemQuantity) {
                $requestedQuantity = $orderItem->quantity;

                // Check if the requested quantity exceeds available stock
                if ($requestedQuantity > $itemQuantity->quantity) {
                    // Assign only the available stock and calculate the remaining quantity
                    $assignedQuantity = $itemQuantity->quantity;
                    $remainingQuantity = $requestedQuantity - $assignedQuantity;

                    // Deduct the available stock
                    $itemQuantity->quantity = 0;
                    $itemQuantity->save();

                    // Notify the user that the requested quantity is more than the available stock
                    $message = "You requested {$requestedQuantity} items, but only {$assignedQuantity} items are available. The remaining {$remainingQuantity} will be issued once the item is restocked.";

                    // Send the notification to the user
                    Mail::to($requisition->user->email)->send(new ItemQuantityAssignedMail($orderItem->item, $assignedQuantity, $remainingQuantity));

                    // Optionally, you can update the requisition to reflect the assigned quantity
                    $orderItem->quantity = $assignedQuantity;
                    $orderItem->save();

                    // You can track the remaining quantity to be fulfilled in another table or update the requisition itself
                    // Example: OrderItemRemainingQuantity::create(['order_item_id' => $orderItem->id, 'remaining_quantity' => $remainingQuantity]);

                } else {
                    // Deduct the full quantity if it's within stock limits
                    $itemQuantity->quantity -= $requestedQuantity;
                    $itemQuantity->save();
                }

                // Check if the remaining quantity is at or below the reorder level
                if ($itemQuantity->quantity <= $orderItem->item->reorder_level) {
                    // Get admin users with the "admin" role
                    $admins = User::role('admin')->get(); // Ensure you're using Spatie's role package

                    // Send an email notification to each admin about restocking
                    foreach ($admins as $admin) {
                        Mail::to($admin->email)->send(new RestockNotificationMail($orderItem->item));
                    }
                }
            }
        }
    }

    // Send notification email to the requisition creator
    Mail::to($requisition->user->email)->send(new RequisitionUpdatedMail($requisition));

    // Redirect with a success message
    return redirect()->route('requisition.index')->with('success', 'Requisition updated and stock quantities adjusted successfully.');
}

public function export()
{
    $requisitions = OrderHeader::with(['orderItems', 'user', 'updatedBy', 'status'])->get();

    // Implement the export logic here (e.g., generate CSV/Excel file)
    return response()->json($requisitions); // Example response
}


public function exportItems(Request $request)
{
    $search = $request->input('search');
    $reorderLevel = $request->input('reorder_level');

    return Excel::download(new ItemsExport($search, $reorderLevel), 'items.xlsx');
}

public function exportPdf(Request $request)
{
    // Get the filters from the request
    $search = $request->input('search');
    $reorderLevel = $request->input('reorder_level');

    // Build the query for items based on filters
    $itemsQuery = Item::query();

    // Apply search filter if provided
    if ($search) {
        $itemsQuery->where(function($query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%')
                  ->orWhere('unique_code', 'like', '%' . $search . '%')
                  ->orWhere('manufacturer_code', 'like', '%' . $search . '%');
        });
    }

    // Apply reorder level filter if provided
    if ($reorderLevel) {
        $itemsQuery->where('reorder_level', '<=', $reorderLevel);
    }

    // Get the filtered items
    $items = $itemsQuery->get();

    // Generate a unique code for the report
    $unique_code = uniqid('ITEM-', true);

    // Get the currently authenticated user (assuming you're using Laravel's authentication system)
    $user_name = auth()->user()->name;

    // Generate the PDF with the filtered items and other data
    $pdf = FacadePdf::loadView('admin.items.pdf', compact('items', 'unique_code', 'user_name'));

    // Return the PDF for download
    return $pdf->download('items-report.pdf');
}

}
