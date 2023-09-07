<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Admin\Albums;
use App\Livewire\Admin\Artists;
use App\Livewire\Admin\Songs;
use App\Livewire\Admin\Users;
use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\Home::class)->name('home');

//------------------- ADMIN -------------------------
Route::group(
    [
        'middleware' => ['auth','verifyIsAdmin'],
        'prefix' => 'admin'
    ],
    function() {
        Route::get('/', \App\Livewire\Admin\Home::class)->name('admin.home');
        Route::get('/users', Users::class)->name('admin.users');
        Route::get('/artists', Artists::class)->name('admin.artists');
        Route::get('/albums', Albums::class)->name('admin.albums');
        Route::get('/songs', Songs::class)->name('admin.songs');
    });


//------------------- ARTIST -------------------------
Route::group(
    [
        'middleware' => ['auth','verifyIsArtist'],
        'prefix' => 'artist'
    ],
    function() {
        Route::get('/', \App\Livewire\Artist\Home::class)->name('artist.home');
        Route::get('/albums', \App\Livewire\Artist\Albums::class)->name('artist.albums');
    });


//------------------- USER -------------------------
Route::group(
    [
        'middleware' => ['auth','verifyIsUser'],
        'prefix' => 'user'
    ],
    function() {
        Route::get('/', \App\Livewire\Artist\Home::class)->name('user.home');
    });




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
