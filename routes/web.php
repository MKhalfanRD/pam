<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\operator\OperatorController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('layout.app');
});

Route::get('/api', [UserController::class, 'index'])->name('user.index');

Route::prefix('operator')->group(function () {
    Route::get('/dashboard', [OperatorController::class, 'index'])->name('operator.index');
    // Route::get('/upload', [OperatorController::class, 'upload'])->name('operator.upload');
    Route::get('/{id}/edit', [OperatorController::class, 'edit'])->name('operator.edit');
    // Route::get('/search', [OperatorController::class, 'search'])->name('operator.search');
    Route::put('/{id}/edit', [OperatorController::class, 'update'])->name('operator.update');
    Route::get('/history', [OperatorController::class, 'history'])->name('operator.history');
    // Route::get('admin/wiup/{id}/edit', [AdminIUPController::class, 'wiupEdit'])->name('admin.wiup.edit');
    // Route::put('admin/wiup/{id}/edit', [AdminIUPController::class, 'wiupUpdate'])->name('admin.wiup.update');
});


