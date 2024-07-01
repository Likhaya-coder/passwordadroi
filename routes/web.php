<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserInterestController;
//use App\Http\Controllers\PasswordResetLinkController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


//Route::post('/interest', [UserInterestController::class, 'store'])->name('interest.store');
Route::get('/interest/store', [UserInterestController::class, 'create'])->name('interest.request');
Route::post('/interest/store', [UserInterestController::class, 'store'])->name('interest.store');
//Route::post('/password/email/', [PasswordResetLinkController::class, 'store'])->name('password.email');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
