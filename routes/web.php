<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ClientController as AdminClientController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

require __DIR__.'/auth.php';

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
})->middleware(['auth', 'verified', 'role:admin|user'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::group([
    'prefix' => 'admin',
    'middleware' => ['auth', 'role:admin']
], function () {
    Route::get('/clients', [AdminClientController::class, 'index'])->name('admin.clients.index');
    Route::get('/clients/sync', [AdminClientController::class, 'sync'])->name('admin.clients.sync');
    Route::get('/clients/pipedrive', [AdminClientController::class, 'pipedrive'])->name('admin.clients.pipedrive');
    Route::get('/clients/website', [AdminClientController::class, 'website'])->name('admin.clients.website');
    Route::get('/clients/salesforce', [AdminClientController::class, 'salesforce'])->name('admin.clients.salesforce');
});
