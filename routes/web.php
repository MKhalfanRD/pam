<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\operator\OperatorController;

Route::get('/', function () {
    return view('layout.app');
});

Route::prefix('operator')->group(function () {
    Route::get('/dashboard', [OperatorController::class, 'index'])->name('operator.index');
    Route::get('/upload', [OperatorController::class, 'upload'])->name('operator.upload');
    Route::post('/edit', [OperatorController::class, 'edit'])->name('operator.edit');
});
