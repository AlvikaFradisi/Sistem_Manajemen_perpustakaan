@extends('layouts.app')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-slate-900 tracking-tight">Dashboard Utama</h1>
    <p class="text-slate-500 mt-1">Ringkasan statistik dan aktivitas terbaru perpustakaan.</p>
</div>

<!-- Stat Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Card 1: Total Koleksi Buku -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 flex items-start gap-4">
        <div class="bg-blue-50 p-3 rounded-lg text-blue-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
            </svg>
        </div>
        <div>
            <p class="text-sm font-semibold text-slate-500 mb-1">Total Judul Buku</p>
            <h3 class="text-2xl font-bold text-slate-900">{{ $totalBooks }} <span class="text-sm font-normal text-slate-500">({{ $totalStock }} Stok)</span></h3>
        </div>
    </div>

    <!-- Card 2: Sedang Dipinjam -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 flex items-start gap-4">
        <div class="bg-indigo-50 p-3 rounded-lg text-indigo-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
        </div>
        <div>
            <p class="text-sm font-semibold text-slate-500 mb-1">Sedang Dipinjam</p>
            <h3 class="text-2xl font-bold text-slate-900">{{ $borrowedBooks }} <span class="text-sm font-normal text-slate-500">Buku</span></h3>
        </div>
    </div>

    <!-- Card 3: Terlambat / Overdue -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 flex items-start gap-4">
        <div class="bg-rose-50 p-3 rounded-lg text-rose-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
        <div>
            <p class="text-sm font-semibold text-slate-500 mb-1">Pengembalian Terlambat</p>
            <h3 class="text-2xl font-bold text-rose-600">{{ $overdueBooks }} <span class="text-sm font-normal text-rose-400">Transaksi</span></h3>
        </div>
    </div>

    <!-- Card 4: Total Denda -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 flex items-start gap-4">
        <div class="bg-emerald-50 p-3 rounded-lg text-emerald-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        </div>
        <div>
            <p class="text-sm font-semibold text-slate-500 mb-1">Total Denda Terkumpul</p>
            <h3 class="text-2xl font-bold text-slate-900">Rp{{ number_format($totalFines, 0, ',', '.') }}</h3>
        </div>
    </div>
</div>

<!-- Transaksi Terbaru -->
<div class="bg-white shadow-sm border border-slate-200 rounded-xl overflow-hidden">
    <div class="px-6 py-4 border-b border-slate-200 bg-slate-50/50 flex justify-between items-center">
        <h3 class="font-semibold text-slate-800">5 Transaksi Peminjaman Terbaru</h3>
        <a href="{{ route('borrowings.index') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-700">Lihat Semua &rarr;</a>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-white border-b border-slate-200 text-xs text-slate-500 uppercase tracking-wider font-semibold">
                    <th class="px-6 py-4">Peminjam</th>
                    <th class="px-6 py-4">Buku</th>
                    <th class="px-6 py-4">Jatuh Tempo</th>
                    <th class="px-6 py-4 text-center">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-sm whitespace-nowrap">
                @forelse($recentBorrowings as $borrowing)
                <tr class="hover:bg-slate-50 transition-colors">
                    <td class="px-6 py-4">
                        <div class="font-bold text-slate-900">{{ $borrowing->member_name }}</div>
                        <div class="text-xs text-slate-500 mt-0.5">NIM: {{ $borrowing->member_nim }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-medium text-slate-700 whitespace-normal min-w-[150px] max-w-[250px] line-clamp-2">
                            {{ $borrowing->book->title ?? 'Buku Dihapus' }}
                        </div>
                    </td>
                    <td class="px-6 py-4 text-slate-600">
                        {{ \Carbon\Carbon::parse($borrowing->due_date)->format('d M Y') }}
                    </td>
                    <td class="px-6 py-4 text-center">
                        @if($borrowing->status === 'Dikembalikan')
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-xs font-bold bg-emerald-50 text-emerald-700 border border-emerald-100">
                                Dikembalikan
                            </span>
                        @elseif($borrowing->status === 'Dipinjam')
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-xs font-bold bg-indigo-50 text-indigo-700 border border-indigo-100">
                                Dipinjam
                            </span>
                        @elseif($borrowing->status === 'Terlambat')
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-xs font-bold bg-rose-50 text-rose-700 border border-rose-100">
                                Terlambat
                            </span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-10 text-center text-slate-500">
                        Belum ada transaksi peminjaman.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
