<?php

namespace App\Http\Controllers;

use App\Models\Requisition; // Make sure to import the Requisition model
use Illuminate\Http\Request;

class RequisitionController extends Controller
{
    // Display a listing of the requisitions
    public function index()
    {
        $requisitions = Requisition::paginate(10); // Fetch existing requisitions
        return view('requisitions.index',  compact('requisitions'));
    }

    // Show the form for creating a new requisition
    public function create()
    {
        return view('requisitions.create');
    }

    // Store a newly created requisition in storage
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'item_name' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'reason' => 'required|string|max:500',
            'date_needed' => 'required|date',
        ]);

        // Create the requisition
        Requisition::create($request->all());

        // Redirect with success message
        return redirect()->route('requisitions.index')->with('success', 'Requisition created successfully.');
    }

    // Show the form for editing the specified requisition
    public function edit(Requisition $requisition)
    {
        return view('requisitions.edit', compact('requisition'));
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
}
