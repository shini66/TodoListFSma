<?php

use App\Http\Controllers\ManagerController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', 'verified'])->prefix('managers')->name('managers.')->group(function () {
    Route::get('/', [ManagerController::class, 'index'])->name('index');
    Route::post('/', [ManagerController::class, 'store'])->name('store');
    Route::get('/create', [ManagerController::class, 'create'])->name('create');
    Route::get('/{manager}', [ManagerController::class, 'show'])->name('show');
    Route::get('/{manager}/edit', [ManagerController::class, 'edit'])->name('edit');
    Route::put('/{manager}', [ManagerController::class, 'update'])->name('update');
    Route::delete('/{manager}', [ManagerController::class, 'destroy'])->name('destroy');
});

Route::middleware(['auth:sanctum', 'verified'])->prefix('tasks')->name('tasks.')->group(function () {
    Route::get('/', [TaskController::class, 'index'])->name('index');
    Route::post('/', [TaskController::class, 'store'])->name('store');
    Route::get('/create', [TaskController::class, 'create'])->name('create');
    Route::get('/{task}', [TaskController::class, 'show'])->name('show');
    Route::get('/{task}/edit', [TaskController::class, 'edit'])->name('edit');
    Route::put('/{task}', [TaskController::class, 'update'])->name('update');
    Route::get('/{task}/toggle', [TaskController::class, 'toggle'])->name('toggle');
    Route::delete('/{task}', [TaskController::class, 'destroy'])->name('destroy');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
