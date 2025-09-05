<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Borrow;
use Illuminate\Support\Facades\Auth;

class BorrowController extends Controller
{
    public function index()
    {
        if(Auth::user()->role === 'admin') {
            $borrows = Borrow::with('book', 'user')->get();
        }else{
            $borrows = Borrow::with('book')->where('user_id', Auth::id())->where('status', 'borrowed')->get();
        }
        return view('students.borrows.index', compact('borrows'));
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
        $bookquantity = Borrow::where('id', $id)->value('book_id');
        Book::where('id', $bookquantity)->increment('quantity');
        $borrow = Borrow::findOrFail($id);
        $borrow->update([
            'return_date' => now(),
            'status' => 'returned',
        ]);
        return redirect()->route('borrows.index')->with('success', 'Book returned successfully.');
    }

    // Admin function to view all returned books
    public function returnedBooks()
    {
        $totalBorrows = Borrow::where('status', 'borrowed')->count();
        $redeemedBooks = Borrow::where('status', 'returned')->count();
        $returnedBooks = Borrow::with('book', 'user')->get();
        return view('admin.returnedbooks', compact('returnedBooks', 'totalBorrows', 'redeemedBooks'));
    }

    
}