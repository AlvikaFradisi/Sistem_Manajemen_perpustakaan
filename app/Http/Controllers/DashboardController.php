<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistik Buku
        $totalBooks = Book::count();
        $totalStock = Book::sum('stock');
        
        // Statistik Peminjaman
        $borrowedBooks = Borrowing::where('status', 'Dipinjam')->count();
        $overdueBooks = Borrowing::where('status', 'Terlambat')->count();
        $totalFines = Borrowing::sum('fine');

        // Transaksi Terakhir
        $recentBorrowings = Borrowing::with('book')
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard.index', compact(
            'totalBooks',
            'totalStock',
            'borrowedBooks',
            'overdueBooks',
            'totalFines',
            'recentBorrowings'
        ));
    }
}
