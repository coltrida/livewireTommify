<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Admin\Albums;
use App\Livewire\Admin\Artists;
use App\Livewire\Admin\Home;
use App\Livewire\Admin\Users;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class);
Route::get('/users', Users::class);
Route::get('/artists', Artists::class);
Route::get('/artists', Albums::class);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
