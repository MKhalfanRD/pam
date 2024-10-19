<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\operator\OperatorController;

Route::get('/', function () {
    return view('layout.app');
});

Route::prefix('operator')->group(function () {
    Route::get('/dashboard', [OperatorController::class, 'index'])->name('operator.index');
    // Route::get('/upload', [OperatorController::class, 'upload'])->name('operator.upload');
    Route::get('/{id}/edit', [OperatorController::class, 'edit'])->name('operator.edit');
    Route::put('/{id}/edit', [OperatorController::class, 'update'])->name('operator.update');
    // Route::get('admin/wiup/{id}/edit', [AdminIUPController::class, 'wiupEdit'])->name('admin.wiup.edit');
    // Route::put('admin/wiup/{id}/edit', [AdminIUPController::class, 'wiupUpdate'])->name('admin.wiup.update');
});
