<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'item_id' => 'required|exists:items,id',
            'quantity'=> 'required',
            'cost'=> 'required'

        ]);



        // Create a new order header
        $order = OrderItem::create([
            'order_id' =>$order->,          // Store the user who created the order
            'status' => 'pending',             // Set initial status
            'remarks' => $oder->remarks, // Assuming you want to carry over remarks
            // Add any other fields you want to populate in the order header
        ]);


    }
}
