<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\MemberController;

use App\Http\Controllers\AuthController;

Route::get('/', [LandingController::class, 'index'])->name('landing.index');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

use App\Http\Controllers\ReportController;

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('books', BookController::class);
    Route::resource('borrowings', BorrowingController::class);
    Route::resource('members', MemberController::class);
    Route::get('/members/{member}/print-card', [MemberController::class, 'printCard'])->name('members.print-card');

    // Reports
    Route::get('/reports/borrowings', [ReportController::class, 'borrowings'])->name('reports.borrowings');
    Route::get('/reports/books', [ReportController::class, 'books'])->name('reports.books');
    Route::get('/reports/fines', [ReportController::class, 'fines'])->name('reports.fines');
});
