<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Student\BookController;
use App\Http\Controllers\Student\BorrowController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Models\Student;
use App\Models\Book;
use App\Models\Borrow;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard', [
        'totalStudents' => Student::count(),
        'totalBooks' => Book::count(),
        'totalBorrows' => Borrow::count(),
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('books', BookController::class);
    Route::post('/books/{book}/borrow', [BorrowController::class, 'store'])->name('borrows.store');
    Route::get('/my-borrows', [BorrowController::class, 'index'])->name('borrows.index');
});

Route::resource('students', StudentController::class);


require __DIR__ . '/auth.php';
