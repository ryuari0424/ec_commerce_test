<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\GuestUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// admin-user route
Route::middleware(['auth', 'admin'])->name('admin.')->prefix('product')->group(function () {
    Route::get('/admin', [AdminUserController::class, 'index'])->name('index');
});

Route::middleware(['auth', 'user'])->name('user.')->group(
    function () {
        Route::get('/product', [UserController::class, 'index'])->name('index');
    }
);

// Route::middleware(['auth', 'user-admin:user'])->name('admin.')->prefix('product')->group(function () {
//     Route::get('/admin', [AdminUserController::class, 'index'])->name('index');
// });

Route::get('/guest', [GuestUserController::class, 'index']);

require __DIR__ . '/auth.php';
