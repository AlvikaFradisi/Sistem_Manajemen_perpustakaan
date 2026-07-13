<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Statistik Kartu (Stat Cards)
        $totalBooks = Book::count();
        $totalStock = Book::sum('stock');
        
        $borrowedBooks = Borrowing::where('status', 'Dipinjam')->count();
        $overdueBooks = Borrowing::where('status', 'Terlambat')->count();
        $totalFines = Borrowing::sum('fine');

        // 2. Data Grafik Kategori Buku (Doughnut Chart)
        $categoryData = Book::select('category', DB::raw('count(*) as total'))
            ->whereNotNull('category')
            ->where('category', '!=', '')
            ->groupBy('category')
            ->orderByDesc('total')
            ->limit(5)
            ->get();
            
        $chartCategories = $categoryData->pluck('category');
        $chartCategoryTotals = $categoryData->pluck('total');

        // 3. Data Grafik Tren Peminjaman 6 Bulan Terakhir
        $sixMonthsAgo = Carbon::now()->subMonths(5)->startOfMonth(); 
        $borrowingsData = Borrowing::where('borrow_date', '>=', $sixMonthsAgo)->get();
        
        $chartMonths = [];
        $chartBorrowingTotals = [];
        
        for ($i = 5; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $monthName = $date->translatedFormat('M Y');
            
            $chartMonths[] = $monthName;
            
            $count = $borrowingsData->filter(function ($item) use ($date) {
                return Carbon::parse($item->borrow_date)->format('Y-m') === $date->format('Y-m');
            })->count();
            
            $chartBorrowingTotals[] = $count;
        }

        // 4. Transaksi Terakhir
        $recentBorrowings = Borrowing::with(['book', 'member'])
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard.index', compact(
            'totalBooks',
            'totalStock',
            'borrowedBooks',
            'overdueBooks',
            'totalFines',
            'recentBorrowings',
            'chartCategories',
            'chartCategoryTotals',
            'chartMonths',
            'chartBorrowingTotals'
        ));
    }
}
