<?php

namespace App\Http\Controllers;
use App\Mail\OrderCreated;
use App\Mail\AdminOrderCreated;
use App\Models\User;
use App\Models\Item;
use App\Models\ItemQuantity;
use App\Models\ItemReceipt;
use App\Models\OrderHeader;
use App\Models\OrderItem;
use App\Models\Requisition; // Make sure to import the Requisition model
use App\Models\Status;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RequisitionsExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Dompdf\Dompdf;

class RequisitionController extends Controller
{
    public function index()
    {
        // Get the authenticated user's requisitions with their order items, paginated by 8 items per page
        $requisitions = OrderHeader::with('orderItems') // Eager load the order items
            ->where('user_id', Auth::id()) // Filter by the authenticated user's ID
            ->paginate(8); // Paginate by 8 items per page

        return view('staff.requisition.index', compact('requisitions'));
    }







    public function create(Request $request)
{
    // Get the order number from the request or generate a new one

    // Fetch items with their quantities
    $items = Item::with('quantities')->get();

    // Fetch the latest receipt cost for each item
    $itemReceipts = ItemReceipt::select('item_id', 'cost_per_item')
        ->whereIn('item_id', $items->pluck('id'))
        ->latest()
        ->get()
        ->keyBy('item_id'); // Key by item_id for easy access

    return view('staff.requisition.create', compact('items', 'itemReceipts'));
}






public function store(Request $request)
{
    // Generate a unique order number
    $orderNumber = 'ORD-' . now()->format('YmdHis') . '-' . rand(1000, 9999);

    // Create the order header
    $order = OrderHeader::create([
        'user_id' => Auth::id(),   // Store the authenticated user's ID
        'status_id' => 1,          // Assuming '1' is the 'pending' status ID
        'order_number' => $orderNumber,
    ]);

    // Decode the items JSON from the hidden input
    $items = json_decode($request->input('items'), true);

    // Loop through the items and create an entry in the OrderItem table
    foreach ($items as $itemId => $itemData) {
        OrderItem::create([
            'order_id' => $order->id,  // Link this item to the order header
            'item_id' => $itemId,      // Item ID
            'quantity' => $itemData['quantity'],  // Item quantity
            'cost' => $itemData['costPerItem'],   // Cost per item
            'remarks' => $itemData['remarks'] ?? '', // Add remarks if provided (default to empty string)
        ]);
    }

    // Send email to the logged-in user who created the requisition
    Mail::to(Auth::user()->email)->send(new OrderCreated($order));

    // Send email to all admin users
    $admins = User::role('Admin')->get(); // Assuming you have a role named 'Admin'
    foreach ($admins as $admin) {
        Mail::to($admin->email)->send(new AdminOrderCreated($order));
    }

    // Redirect with a success message
    return redirect()->route('requisitions.index')->with('success', 'Order created successfully.');
}


    public function edit($id)
    {
        // Retrieve the specific requisition along with its order items
        $requisition = OrderHeader::with('orderItems.item') // Eager load order items and their related items
            ->where('user_id', Auth::id()) // Ensure it belongs to the authenticated user
            ->findOrFail($id); // If not found, it returns a 404

        // Fetch all statuses for the dropdown (if applicable)
        $statuses = Status::all(); // Adjust this according to your model

        return view('staff.requisition.edit', compact('requisition', 'statuses'));
    }


    // Update the specified requisition in storage
    public function update(Request $request, Requisition $requisition)
    {
        // Validate the request
        $request->validate([
            'item_name' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'reason' => 'required|string|max:500',
            'date_needed' => 'required|date',
        ]);

        // Update the requisition
        $requisition->update($request->all());

        // Redirect with success message
        return redirect()->route('requisitions.index')->with('success', 'Requisition updated successfully.');
    }

    // Remove the specified requisition from storage
    public function destroy(Requisition $requisition)
    {
        $requisition->delete(); // Delete the requisition

        // Redirect with success message
        return redirect()->route('requisitions.index')->with('success', 'Requisition deleted successfully.');
    }
    public function storeOrder(Request $request)
    {
        // Validate the request
        $request->validate([
            'remarks' => 'required|string',
            'item_id' => 'required|array|min:1', // Ensure at least one item is selected
            'item_id.*' => 'exists:items,id', // Each item must exist
            'quantity' => 'required|array|min:1', // Ensure matching quantities
            'quantity.*' => 'required|integer|min:1', // Each quantity must be positive
        ]);

        // Create a new OrderHeader
        $orderHeader = OrderHeader::create([
            'user_id' => auth()->id(), // Store the user who created the requisition
            'order_number' => $this->generateOrderNumber(), // Generate a unique order number
            'remarks' => $request->input('remarks'), // Store the remarks provided
        ]);

        // Array to collect order items for bulk insert
        $orderItems = [];

        foreach ($request->input('item_id') as $index => $itemId) {
            $quantity = $request->input('quantity')[$index];

            // Retrieve the item and validate quantity
            $item = Item::findOrFail($itemId);
            $availableQuantity = $item->quantities()->sum('quantity'); // Calculate available stock

            if ($quantity > $availableQuantity) {
                return redirect()->back()->withErrors([
                    'quantity' => "Cannot request {$quantity} of {$item->name}. Only {$availableQuantity} available."
                ])->withInput();
            }

            // Prepare the data for the new order item
            $orderItems[] = [
                'order_id' => $orderHeader->id, // Link to OrderHeader
                'item_id' => $itemId,
                'quantity' => $quantity,
                'cost' => optional($item->receipts->sortByDesc('created_at')->first())->cost_per_item ?? 0,
                'remarks' => $request->input('remarks'), // Add remarks for this order item
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insert the order items into the database in a single query
        OrderItem::insert($orderItems);

        // Redirect to requisitions page with success message
        return redirect()->route('requisitions.index')->with('success', 'Requisition created successfully!');
    }

    public function show($id)
    {
        // Retrieve the specific requisition along with its order items
        $requisition = OrderHeader::with('orderItems.item') // Eager load order items and their related items
            ->where('user_id', Auth::id()) // Ensure it belongs to the authenticated user
            ->findOrFail($id); // If not found, it returns a 404

        return view('staff.requisition.show', compact('requisition'));
    }

    public function export()
    {
        return Excel::download(new RequisitionsExport, 'requisitions.xlsx');
    }


    public function print()
    {
        $requisitions = OrderHeader::with('orderItems') // Eager load the order items
        ->where('user_id', Auth::id()) // Filter by the authenticated user's ID
        ->paginate(8); // Paginate by 8 items per page
        $pdf = Pdf::loadView('staff.requisition.print', compact('requisitions')); // Load the view into the PDF
        return $pdf->stream('requisitions.pdf'); // Stream the PDF in the browser
    }


}
