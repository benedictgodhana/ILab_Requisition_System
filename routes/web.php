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
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\RequisitionController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StockManagementController;
use App\Http\Controllers\UserController;
use PhpOffice\PhpSpreadsheet\Settings;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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


        Route::get('/admin/requisitions/{id}', [AdminController::class, 'view'])->name('requisition.view');
Route::get('/requisitions/{id}/edit', [AdminController::class, 'editrequisition'])->name('requisition.edit');
Route::get('/admin/requisitions', [AdminController::class, 'requisitions'])->name('requisition.index');
Route::get('/requisitions/export', [RequisitionController::class, 'export'])->name('requisition.exportAll');
Route::put('/requisitions/{id}/update', [AdminController::class, 'updateRequisition'])->name('updaterequisitions');
Route::get('items/export', [AdminController::class, 'exportItems'])->name('items.export');
Route::get('/items/export-pdf', [AdminController::class, 'exportPdf'])->name('items.exportPdf');
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

        Route::resource('admin/stock', StockManagementController::class)
         ->names([
        'index' => 'stock.index',
        'create' => 'stock.create',
        'store' => 'stock.store',
        'show' => 'stock.show',
        'edit' => 'stock.edit',
        'update' => 'stock.update',
        'destroy' => 'stock.destroy',
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




    Route::middleware(['auth', 'role:Staff'])->group(function () {

        Route::get('/staff/profile', [ProfileController::class, 'index'])->name('staff.profile');

        Route::get('/staff/dashboard', [DashboardController::class, 'staff'])->name('staff.dashboard');

        Route::put('/password/update', [ProfileController::class, 'updatePassword'])->name('password.update');

        Route::put('/password/update', [SettingController::class, 'updatePassword'])->name('password.update');
Route::get('/requisitions/export', [RequisitionController::class, 'export'])->name('requisitions.export');
Route::get('/requisitions/print', [RequisitionController::class, 'print'])->name('requisitions.print');



        Route::resource('staff/requisitions', RequisitionController::class)
        ->names([
            'index' => 'requisitions.index',
            'create' => 'requisitions.create',
            'store' => 'requisitions.store',
            'show' => 'requisitions.show',
            'edit' => 'requisitions.edit',
            'update' => 'requisitions.update',
            'destroy' => 'requisitions.destroy',
        ]);

        Route::post('/requisitions/store-order', [RequisitionController::class, 'storeOrder'])->name('requisitions.storeOrder');


        Route::resource('orders', OrderController::class)
        ->names([
            'index' => 'orders.index',
            'create' => 'orders.create',
            'store' => 'orders.store',
            'show' => 'orders.show',
            'edit' => 'orders.edit',
            'update' => 'orders.update',
            'destroy' => 'orders.destroy',
        ]);






    });


    // Other authenticated routes...
});

// Logout route
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');
