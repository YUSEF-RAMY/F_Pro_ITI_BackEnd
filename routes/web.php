<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Student\BookController;
use App\Http\Controllers\Student\BorrowController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/books', [BookController::class, 'index'])->name('books.index');
    Route::post('/books/{book}/borrow', [BorrowController::class, 'store'])->name('borrows.store'); 
    Route::get('/my-borrows', [BorrowController::class, 'index'])->name('borrows.index'); 
});
require __DIR__.'/auth.php';
