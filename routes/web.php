<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Student\BookController;
use App\Http\Controllers\Student\BorrowController;
use App\Http\Controllers\StudentController;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    $user = Auth::user();

    if ($user->role === 'admin') {
        // بيانات خاصة بالادمن
        $borrows = Borrow::with(['user', 'book'])->get();
        $count = Borrow::count();

        return view('dashboard', [
            'count' => $count,
            'borrows' => $borrows,
            'redeemedBooks' => Borrow::where('status', 'returned')->count(),
            'totalStudents' => User::count(),
            'totalBorrows' => Borrow::where('status', 'borrowed')->count(),
            'totalBooks' => Book::count(),
        ]);
    } else {
        // بيانات خاصة باليوزر العادي
        $borrows = Borrow::with(['book'])
            ->where('user_id', $user->id)
            ->get();
        $count = Borrow::where('user_id', $user->id)->count();

        return view('dashboard', [
            'count' => $count,
            'borrows' => $borrows,
            'redeemedBooks' => Borrow::where('user_id', $user->id)
                                    ->where('status', 'returned')
                                    ->count(),
            'totalStudents' => null, // مش هتظهر لليوزر
            'totalBooks' => Book::count(),    // مش هتظهر لليوزر
            'totalBorrows' => Borrow::where('user_id', $user->id)
                                    ->where('status', 'borrowed')
                                    ->count(),
        ]);
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
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

// Admin route to view books
Route::get('/admin/returned-books', [BorrowController::class, 'returnedBooks'])->name('admin.returnedBooks')->middleware('admin');
require __DIR__ . '/auth.php';
