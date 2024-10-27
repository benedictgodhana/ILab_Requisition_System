<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'IlabAfrica Item Requisition System') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body, a, button {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #f5f5f5;
        }

        /* Sidebar styles */
        #sidebar {
            background-color: darkblue;
            height: 100vh;
            overflow-y: auto;
        }

        header {
            background: white;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.05);
        }

        .sidebar-link {
            padding: 12px 16px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 900;
            color: white;
        }

        .sidebar-active {
            background-color: #2196f3;
            color: white;
        }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside id="sidebar" class="w-64 h-screen">
            <div class="p-6 sidebar-logo">
                <img src="/images/iLab white Logo-01.png" alt="IlabAfrica Logo" style="height:250px">
            </div>
            <div class="p-6">
                <ul>
                    <li><a href="{{ route('superadmin.dashboard') }}" class="sidebar-link {{ request()->is('superadmin/dashboard') ? 'sidebar-active' : '' }}">Dashboard</a></li>
                    <li><a href="{{ route('requisitions.index') }}" class="sidebar-link">Requisitions</a></li>
                    <li><a href="{{ route('inventories.index') }}" class="sidebar-link">Inventory</a></li>
                    <li><a href="{{ route('users.index') }}" class="sidebar-link">User Management</a></li>
                    <li><a href="/logout" class="sidebar-link">Logout</a></li>
                </ul>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 bg-gray-100">
            @include('layouts.navigation') <!-- Common navigation, if any -->

            <main class="p-6">
                {{ $slot }} <!-- Dynamic content here -->
            </main>
        </div>
    </div>
</body>
</html>
