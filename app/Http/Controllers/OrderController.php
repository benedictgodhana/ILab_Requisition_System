<?php

namespace App\Http\Controllers;

use App\Models\OrderHeader;
use App\Models\Requisition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the orders.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Fetch all orders
        $requisitions = OrderHeader::all();


        dd($requisitions);
        return view('staff.requisition.index', compact('requisitions'));
    }

    /**
     * Show the form for creating a new order.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Show form to create a new order if needed
        return view('orders.create');
    }

    /**
     * Store a newly created order in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'requisition_id' => 'required|exists:requisitions,id',
        ]);

        // Fetch the requisition to gather necessary details
        $requisition = Requisition::find($request->requisition_id);

        if (!$requisition) {
            return response()->json(['error' => 'Requisition not found.'], 404);
        }

        // Create a new order header
        $order = OrderHeader::create([
            'user_id' => Auth::id(),          // Store the user who created the order
            'status' => 'pending',             // Set initial status
            'remarks' => $requisition->remarks, // Assuming you want to carry over remarks
            // Add any other fields you want to populate in the order header
        ]);

        // You might also want to create related order items here if you have that structure
        // For example, if your order has items linked to the requisition
        // OrderItem::create([...]); // Use the relevant model to create order items

        return response()->json([
            'id' => $order->id,
            'item' => $requisition->item->name, // Assuming your requisition has an item relationship
            'quantity' => $requisition->quantity,
            'date_needed' => $requisition->date_needed,
            'status' => $order->status,
            'remarks' => $requisition->remarks,
        ], 201); // Return 201 status code for created resources
    }

    /**
     * Display the specified order.
     *
     * @param \App\Models\OrderHeader $order
     * @return \Illuminate\View\View
     */
    public function show(OrderHeader $order)
    {
        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified order.
     *
     * @param \App\Models\OrderHeader $order
     * @return \Illuminate\View\View
     */
    public function edit(OrderHeader $order)
    {
        return view('orders.edit', compact('order'));
    }

    /**
     * Update the specified order in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\OrderHeader $order
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, OrderHeader $order)
    {
        $request->validate([
            'status' => 'required|string',
            // Add other fields that need to be updated
        ]);

        $order->update([
            'status' => $request->status,
            // Update other fields as necessary
        ]);

        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }

    /**
     * Remove the specified order from storage.
     *
     * @param \App\Models\OrderHeader $order
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(OrderHeader $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
}
