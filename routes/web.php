<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return Auth::user() ? redirect('/dashboard') : redirect('/login');
});


Route::get('/dashboard', function () {
    // return view('dashboard');
    return view('pages.dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
Route::get('/{page?}', function ($page = null) {
    $page = $page ?? 'index.html';

    $path = public_path("html/{$page}");

    if (File::exists($path)) {
        return response()->file($path);
    }

    abort(404);
});
