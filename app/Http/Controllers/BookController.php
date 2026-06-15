<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $category = $request->input('category');
        
        // Ambil daftar kategori unik yang ada di database untuk dropdown filter
        $categories = Book::select('category')->whereNotNull('category')->where('category', '!=', '')->distinct()->pluck('category');

        // Mengambil data buku dengan fitur pencarian, filter kategori, dan paginasi
        $books = Book::when($search, function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                      ->orWhere('author', 'like', "%{$search}%")
                      ->orWhere('isbn', 'like', "%{$search}%");
                });
            })
            ->when($category, function ($query, $category) {
                return $query->where('category', $category);
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('books.index', compact('books', 'categories', 'search', 'category'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:100',
            'isbn' => 'required|string|max:20|unique:books,isbn',
            'publisher' => 'nullable|string|max:100',
            'year' => 'nullable|integer',
            'category' => 'nullable|string|max:50',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
        ]);

        Book::create($validated);
        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan!');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:100',
            'isbn' => 'required|string|max:20|unique:books,isbn,' . $book->id,
            'publisher' => 'nullable|string|max:100',
            'year' => 'nullable|integer',
            'category' => 'nullable|string|max:50',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
        ]);

        $book->update($validated);
        return redirect()->route('books.index')->with('success', 'Data buku berhasil diperbarui!');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus!');
    }
}
