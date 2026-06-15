<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowingController;

Route::get('/', function () {
    return redirect()->route('books.index'); // Kita arahkan halaman utama ke daftar buku dulu
});

Route::resource('books', BookController::class);
Route::resource('borrowings', BorrowingController::class);
