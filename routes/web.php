<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Student\BookController;
use App\Http\Controllers\Student\BorrowController;
use App\Http\Controllers\StudentController;
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

Route::middleware(['auth'])->group(function () {
    Route::resource('books', BookController::class);
    Route::post('/books/{book}/borrow', [BorrowController::class, 'store'])->name('borrows.store');
    // Route::get('/my-borrows', [BorrowController::class, 'index'])->name('borrows.index');
});

Route::resource('students', StudentController::class);

// borrow book
Route::get('borrows', [BorrowController::class, 'index'])->name('borrows.index');
Route::post('borrows/{book}', [BorrowController::class, 'store'])->name('borrows.store');
Route::post('/borrows/{id}/return', [BorrowController::class, 'return'])->name('borrows.return');

require __DIR__ . '/auth.php';
