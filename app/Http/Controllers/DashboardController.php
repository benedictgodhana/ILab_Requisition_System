<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all(); // Fetch all users
        return view('dashboard', compact('users')); // Pass users to the view
    }


    public function superAdmin()
    {
        // Your logic for the SuperAdmin dashboard
        return view('superadmin.dashboard'); // Make sure you have this view created
    }



    public function Admin()
    {
        // Your logic for the SuperAdmin dashboard
        return view('admin.dashboard'); // Make sure you have this view created
    }
}
