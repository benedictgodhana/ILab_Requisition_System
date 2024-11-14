<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport; // Create this export class for Excel
use App\Models\Department;
use Barryvdh\DomPDF\Facade as PDF; // Import the PDF facade
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role; // Import the Role model

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all(); // Fetch all users for listing
        return view('superadmin.users.index', compact('users')); // Assuming there's a view for listing users
    }

    /**
     * Show the form for creating a new resource.
     */


     public function create()
     {
         $roles = Role::all(); // Fetch all roles from the Role model
         $departments = Department::all(); // Fetch all departments

         return view('superadmin.users.create', compact('roles', 'departments')); // Pass roles and departments to the view
     }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed', // Ensure password confirmation matches
        'role' => 'required|exists:roles,id', // Validate the role by ID
        'department_id' => 'required|exists:departments,id', // Validate that the department exists
    ]);

        // Create a new user
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'department_id' => $validatedData['department_id'], // Save the department ID
            'added_by' => auth()->user()->id, // Capture the ID of the authenticated user who added this user
        ]);

        // Assign the role to the user using Spatie
        $user->roles()->attach($validatedData['role']); // Attach the role using the ID

        // Redirect back to the users index page with a success message
        return redirect()->route('users.index')->with('success', 'User added successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('superadmin.users.show', compact('user')); // Show details for a specific user
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all(); // Retrieve all roles
        $departments = Department::all(); // Retrieve all departments

        return view('superadmin.users.edit', compact('user', 'roles', 'departments'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // Validate the input data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id, // Exclude current user's email from uniqueness check
            'password' => 'nullable|string|min:8|confirmed', // Password is optional; confirm if provided
            'role' => 'required|exists:roles,name', // Validate that the role name exists
            'department_id' => 'required|exists:departments,id', // Validate that the department exists
        ]);

        // Prepare the data for update
        $updateData = [
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'department_id' => $validatedData['department_id'], // Update department
        ];

        // Only hash the password if it’s provided
        if (!empty($validatedData['password'])) {
            $updateData['password'] = bcrypt($validatedData['password']);
        }

        // Update the user
        $user->update($updateData);

        // Update the role using Spatie (use the role name from the validated data)
        $user->syncRoles([$validatedData['roles']]); // Sync the new role by name

        // Redirect with success message
        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('success', 'User deleted successfully.');
    }

    /**
     * Export users to Excel.
     */
    public function exportExcel()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    /**
     * Print users as PDF.
     */
    public function printPdf()
    {
        $users = User::all(); // Fetch all users
        $pdf = PDF::loadView('users.pdf', compact('users')); // Create a view for the PDF
        return $pdf->download('users.pdf'); // Download the generated PDF
    }
}
