<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\operator\OperatorController;
use App\Http\Controllers\warga\WargaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('auth.login');
});


Route::get('/api', [UserController::class, 'index'])->name('user.index');

// // Rute untuk login
// Route::get('/login', [AuthenticatedSessionController::class, 'create'])
//     ->middleware(['guest'])
//     ->name('login');

// Route::post('/login', [AuthenticatedSessionController::class, 'store'])
//     ->middleware(['guest']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function(){
    //operator
    Route::prefix('operator')->group(function () {
        Route::get('/', [OperatorController::class, 'index'])->name('operator.index');
        Route::get('/{id}/edit', [OperatorController::class, 'edit'])->name('operator.edit');
        Route::put('/{id}/edit', [OperatorController::class, 'update'])->name('operator.update');
        Route::get('/history', [OperatorController::class, 'history'])->name('operator.history');
    });
    //warga
    Route::prefix('warga')->group(function () {
        Route::get('/', [WargaController::class, 'index'])->name('warga.index');
        Route::get('/{id}/edit', [WargaController::class, 'edit'])->name('warga.edit');
        Route::put('/{id}/edit', [WargaController::class, 'update'])->name('warga.update');
        Route::get('/history', [WargaController::class, 'history'])->name('warga.history');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rute dari Laravel Breeze (untuk authentication)
// Route::get('/login', function () {
//     return view('auth.login');
// })->middleware(['auth', 'verified'])->name('login');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Memanggil rute auth dari Breeze
require __DIR__.'/auth.php';
