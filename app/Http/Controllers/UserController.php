<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport; // Create this export class for Excel
use Barryvdh\DomPDF\Facade as PDF; // Import the PDF facade

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all(); // Fetch all users for listing
        return view('users.index', compact('users')); // Assuming there's a view for listing users
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create'); // Return the view for creating a new user
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate and store new user data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        try {
            // Create a new user with validated data
            User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => bcrypt($validatedData['password']),
                'added_by' => auth()->user()->name, // Capture the authenticated user's name
            ]);

            // Redirect back with success message
            return redirect()->route('users.index')->with('success', 'User added successfully!');
        } catch (\Exception $e) {
            // Log the error message for debugging (optional)
            \Log::error($e->getMessage());

            // Redirect back with error message
            return redirect()->back()->with('error', 'Failed to add user: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show', compact('user')); // Show details for a specific user
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user')); // Return the view for editing user
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        try {
            // Validate the input data
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $user->id, // Exclude current user's email from uniqueness check
                'password' => 'nullable|string|min:8', // Password is optional
            ]);

            // Prepare the data for update
            $updateData = [
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
            ];

            // Only hash the password if it’s provided
            if (!empty($validatedData['password'])) {
                $updateData['password'] = bcrypt($validatedData['password']);
            }

            // Update the user
            $user->update($updateData);

            // Redirect with success message
            return redirect()->route('users.index')->with('success', 'User updated successfully!');
        } catch (\Exception $e) {
            // Log the error for easier debugging (optional)
            \Log::error('User Update Error: ' . $e->getMessage());

            // Redirect with an error message
            return redirect()->back()->with('error', 'Failed to update user: ' . $e->getMessage());
        }
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
