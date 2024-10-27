<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    // Display a listing of the departments
    public function index()
    {
        $departments = Department::all();
        return view('superadmin.departments.index', compact('departments'));
    }

    // Show the form for creating a new department
    public function create()
    {
        return view('superadmin.departments.create');
    }

    // Store a newly created department in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Store department with the logged-in user's ID as 'created_by'
        Department::create([
            'name' => $request->name,
            'description' => $request->description,
            'created_by' => auth()->id(), // Capture the ID of the logged-in user
        ]);

        return redirect()->route('departments.index')->with('success', 'Department created successfully.');
    }


    // Display the specified department
    public function show(Department $department)
    {
        return view('superadmin.departments.show', compact('department'));
    }

    // Show the form for editing the specified department
    public function edit(Department $department)
    {
        return view('superadmin.departments.edit', compact('department'));
    }

    // Update the specified department in storage
    public function update(Request $request, Department $department)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Capture updated_by field with the current user's ID
        $department->update([
            'name' => $request->name,
            'description' => $request->description,
            'updated_by' => auth()->id(),
        ]);

        return redirect()->route('departments.index')->with('success', 'Department updated successfully.');
    }


    // Remove the specified department from storage
    public function destroy(Department $department)
    {
        $department->delete();

        return redirect()->route('departments.index')->with('success', 'Department deleted successfully.');
    }
}
