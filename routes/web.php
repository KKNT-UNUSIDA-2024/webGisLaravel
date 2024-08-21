<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TempatsController;
use Illuminate\Support\Facades\Route;
use App\Models\Tempats;
use App\Models\Kategori;

Route::get('/', function () {
    return view('welcome', ['categories' => Kategori::all(), 'tempats' => Tempats::all()]);
});

// handle dashboard request
Route::get('/dashboard', function () {
    return view('dashboard', ['kategori' => Kategori::all()]);
})->middleware(['auth', 'verified'])->name('dashboard');

// handle semua data request
Route::get('/semua-data', function () {
    return view('semua-data', ['tempats' => Tempats::all()]);
})->middleware(['auth', 'verified'])->name('semua-data');

// handle edit data request
Route::get('/edit-data/{id}', function ($id) {
    return view('edit-data', ['tempats' => Tempats::findOrFail($id), 'kategori' => Kategori::all()]);
})->middleware(['auth', 'verified'])->name('edit-data');

Route::put('/edit-data/{id}', [TempatsController::class, 'update'])->middleware(['auth', 'verified'])->name('edit-data');

// handle tambah data request
Route::post('/tambah-data', [TempatsController::class, 'store'])->middleware(['auth', 'verified'])->name('tambah-data');

// handle delete data request
Route::delete('/tempats/{id}', [TempatsController::class, 'destroy'])->middleware(['auth', 'verified'])->name('tempats.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
