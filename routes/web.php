<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Models\Blog;
use App\Http\Controllers\RequisitionController;
use App\Http\Controllers\InventoryController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::resource('users', UserController::class);

Route::resource('inventories', InventoryController::class);


Route::resource('requisitions', RequisitionController::class);


Route::resource('users', UserController::class)->middleware(['auth', 'verified']);

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

    Route::resource('blogs', BlogController::class);

    Route::get('/', function () {
        // Fetch all blogs from the database


        // Pass the blogs to the 'welcome' view
        return view('auth.login');
    });



Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/blog', function () {

    $blogs = Blog::all();

    return view('Blog', compact('blogs'));
});


Route::get('/about', function () {
    return view('About');
});



Route::get('/destination', function () {
    return view('Destination');
});


Route::get('/users/export-excel', [UserController::class, 'exportExcel'])->name('users.export');
Route::get('/users/print-pdf', [UserController::class, 'printPdf'])->name('users.print.pdf');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';
