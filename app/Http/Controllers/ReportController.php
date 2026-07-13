<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrowing;
use App\Models\Book;

class ReportController extends Controller
{
    public function borrowings(Request $request)
    {
        $query = Borrowing::with(['book', 'member'])->orderBy('created_at', 'desc');

        if ($request->has('start_date') && $request->has('end_date')) {
            $query->whereBetween('borrow_date', [$request->start_date, $request->end_date]);
        }

        $borrowings = $query->get();

        if ($request->has('print')) {
            return view('reports.borrowings-print', compact('borrowings'));
        }

        return view('reports.borrowings', compact('borrowings'));
    }

    public function books(Request $request)
    {
        $query = Book::orderBy('created_at', 'desc');

        if ($request->has('start_date') && $request->has('end_date')) {
            $query->whereBetween('created_at', [
                $request->start_date . ' 00:00:00',
                $request->end_date . ' 23:59:59'
            ]);
        }

        $books = $query->get();

        if ($request->has('print')) {
            return view('reports.books-print', compact('books'));
        }

        return view('reports.books', compact('books'));
    }

    public function fines(Request $request)
    {
        $query = Borrowing::with(['book', 'member'])
                          ->where('fine', '>', 0)
                          ->orderBy('created_at', 'desc');

        if ($request->has('start_date') && $request->has('end_date')) {
            $query->whereBetween('return_date', [$request->start_date, $request->end_date]);
        }

        $fines = $query->get();

        if ($request->has('print')) {
            return view('reports.fines-print', compact('fines'));
        }

        return view('reports.fines', compact('fines'));
    }
}
