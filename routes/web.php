<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| These routes define guest, authenticated, and role-based access control.
| They are loaded within the "web" middleware group.
|
*/
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\UserController;

// Guest routes (unauthenticated users)
Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return view('auth.login'); // Redirect to login page on '/'
    })->name('login'); // Name the route for easier reference

    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
});

// Authenticated routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard'); // Redirect staff and general users here
    })->name('dashboard');

    // Role-based routes
    Route::middleware('auth','role:SuperAdmin')->group(function () {
        Route::get('/superadmin/dashboard', [DashboardController::class, 'superAdmin'])->name('superadmin.dashboard');

        Route::resource('superadmin/departments', DepartmentController::class)
    ->names([
        'index' => 'departments.index',
        'create' => 'departments.create',
        'store' => 'departments.store',
        'show' => 'departments.show',
        'edit' => 'departments.edit',
        'update' => 'departments.update',
        'destroy' => 'departments.destroy',
    ]);

    Route::resource('superadmin/users', UserController::class)
    ->names([
        'index' => 'users.index',
        'create' => 'users.create',
        'store' => 'users.store',
        'show' => 'users.show',
        'edit' => 'users.edit',
        'update' => 'users.update',
        'destroy' => 'users.destroy',
    ]);
    });

    Route::middleware(['auth', 'role:Admin'])->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

        Route::resource('admin/items', AdminController::class)
        ->names([
            'index' => 'items.index',
            'create' => 'items.create',
            'store' => 'items.store',
            'show' => 'items.show',
            'edit' => 'items.edit',
            'update' => 'items.update',
            'destroy' => 'items.destroy',
        ]);


        Route::resource('admin/receipts', ReceiptController::class)
        ->names([
            'index' => 'receipts.index',
            'create' => 'receipts.create',
            'store' => 'receipts.store',
            'show' => 'receipts.show',
            'edit' => 'receipts.edit',
            'update' => 'receipts.update',
            'destroy' => 'receipts.destroy',
        ]);
    });


    // Other authenticated routes...
});

// Logout route
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');
