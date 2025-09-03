<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Borrow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BorrowController extends Controller
{
    public function index()
    {
        $borrows = Borrow::with('book')->where('user_id', Auth::id())->get();
        return view('student.borrows.index', compact('borrows'));
    }

    public function store(Book $book)
    {
        if ($book->quantity < 1) {
            return redirect()->back()->with('error', 'Book is not available for borrowing.');
        }

        Borrow::create([
            'user_id' => Auth::id(),
            'book_id' => $book->id,
            'borrow_date' => now(),
            'status' => 'borrowed',
        ]);

        $book->decrement('quantity');

        return redirect()->route('borrows.index')->with('success', 'Book borrowed successfully.');
    }


    public function return($id)
    {
        $borrow = Borrow::findOrFail($id);
        $borrow->update([
            'return_date' => now(),
            'status' => 'returned',
        ]);

        return redirect()->route('borrows.index')->with('success', 'Book returned successfully.');
    }
}
