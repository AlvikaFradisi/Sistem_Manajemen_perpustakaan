<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowing;
use App\Models\Member;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BorrowingController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $status = $request->input('status');

        $borrowings = Borrowing::with(['book', 'member'])
            ->when($search, function ($query, $search) {
                return $query->whereHas('member', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('nim', 'like', "%{$search}%");
                });
            })
            ->when($status, function ($query, $status) {
                return $query->where('status', $status);
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('borrowings.index', compact('borrowings', 'search', 'status'));
    }

    public function create()
    {
        // Hanya tampilkan buku yang stoknya lebih dari 0
        $books = Book::where('stock', '>', 0)->get();
        $members = Member::all();
        return view('borrowings.create', compact('books', 'members'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'book_id' => 'required|exists:books,id',
            'member_id' => 'required|exists:members,id',
            'borrow_date' => 'required|date',
            'due_date' => 'required|date|after_or_equal:borrow_date',
        ]);

        $book = Book::findOrFail($validated['book_id']);

        if ($book->stock <= 0) {
            return back()->withInput()->with('error', 'Stok buku ini sedang habis.');
        }

        // Set status default
        $validated['status'] = 'Dipinjam';
        $validated['fine'] = 0;

        // Kurangi stok buku
        $book->decrement('stock');

        Borrowing::create($validated);

        return redirect()->route('borrowings.index')->with('success', 'Data peminjaman berhasil ditambahkan!');
    }

    public function show(Borrowing $borrowing)
    {
        return view('borrowings.show', compact('borrowing'));
    }

    public function edit(Borrowing $borrowing)
    {
        $books = Book::all();
        $members = Member::all();
        return view('borrowings.edit', compact('borrowing', 'books', 'members'));
    }

    public function update(Request $request, Borrowing $borrowing)
    {
        $validated = $request->validate([
            'status' => 'required|in:Dipinjam,Dikembalikan,Terlambat,Rusak,Hilang',
            'return_date' => 'nullable|date',
            'fine' => 'nullable|numeric|min:0',
        ]);

        // Jika status berubah dari Dipinjam ke status akhir
        if ($borrowing->status === 'Dipinjam' && in_array($validated['status'], ['Dikembalikan', 'Terlambat', 'Rusak', 'Hilang'])) {
            // Kembalikan stok buku KECUALI jika Hilang
            if ($validated['status'] !== 'Hilang') {
                $borrowing->book->increment('stock');
            }
            
            if (empty($validated['return_date'])) {
                $validated['return_date'] = Carbon::now()->toDateString();
            }

            // Hitung denda jika denda belum diisi manual atau bernilai 0
            if (empty($validated['fine']) || $validated['fine'] == 0) {
                if ($validated['status'] === 'Terlambat') {
                    $returnDate = Carbon::parse($validated['return_date']);
                    $dueDate = Carbon::parse($borrowing->due_date);
                    
                    if ($returnDate->gt($dueDate)) {
                        $daysLate = $returnDate->diffInDays($dueDate);
                        $finePerDay = 2000; // Denda Rp 2.000 per hari
                        $validated['fine'] = $daysLate * $finePerDay;
                    }
                } elseif ($validated['status'] === 'Rusak') {
                    $validated['fine'] = 20000; // Denda default rusak Rp 20.000
                } elseif ($validated['status'] === 'Hilang') {
                    $validated['fine'] = 50000; // Denda default hilang Rp 50.000
                }
            }
        }

        $borrowing->update($validated);

        return redirect()->route('borrowings.index')->with('success', 'Data peminjaman berhasil diperbarui!');
    }

    public function destroy(Borrowing $borrowing)
    {
        // Jika buku belum dikembalikan, kembalikan stoknya terlebih dahulu
        if ($borrowing->status === 'Dipinjam') {
            $borrowing->book->increment('stock');
        }

        $borrowing->delete();

        return redirect()->route('borrowings.index')->with('success', 'Data peminjaman berhasil dihapus!');
    }
}
