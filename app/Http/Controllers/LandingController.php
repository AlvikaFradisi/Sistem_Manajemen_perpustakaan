<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $category = $request->input('category');

        $query = Book::query();

        if ($search) {
            $query->where('title', 'like', "%{$search}%")
                  ->orWhere('author', 'like', "%{$search}%");
        }

        if ($category) {
            $query->where('category', $category);
        }

        // Get unique categories for filter
        $categories = Book::select('category')
                          ->whereNotNull('category')
                          ->where('category', '!=', '')
                          ->distinct()
                          ->pluck('category');

        $books = $query->latest()->paginate(12);

        return view('landing.index', compact('books', 'categories', 'search', 'category'));
    }
}
