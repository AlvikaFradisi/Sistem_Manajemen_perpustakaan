@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-slate-900 tracking-tight">Detail Peminjaman</h1>
            <p class="text-slate-500 mt-1">Informasi lengkap transaksi peminjaman buku.</p>
        </div>
        <div class="flex gap-2">
            <a href="{{ route('borrowings.index') }}" class="p-2 bg-white text-slate-500 hover:text-sky-600 rounded-lg border border-slate-200 shadow-sm hover:border-sky-200 transition-colors" title="Kembali">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>
            <a href="{{ route('borrowings.edit', $borrowing->id) }}" class="inline-flex items-center px-4 py-2 bg-sky-50 border border-sky-100 rounded-lg text-sm font-semibold text-sky-700 hover:bg-sky-100 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                </svg>
                Update Status
            </a>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden mb-8">
        <!-- Status Banner -->
        @if($borrowing->status === 'Dikembalikan')
        <div class="bg-emerald-50 px-8 py-4 border-b border-emerald-100 flex items-center gap-3">
            <div class="p-2 bg-emerald-100 rounded-full text-emerald-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
            </div>
            <div>
                <h3 class="font-bold text-emerald-800">Buku Telah Dikembalikan</h3>
                <p class="text-sm text-emerald-600">Transaksi peminjaman ini sudah selesai.</p>
            </div>
        </div>
        @elseif($borrowing->status === 'Dipinjam')
        <div class="bg-sky-50 px-8 py-4 border-b border-sky-100 flex items-center gap-3">
            <div class="p-2 bg-sky-100 rounded-full text-sky-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div>
                <h3 class="font-bold text-sky-800">Sedang Dipinjam</h3>
                <p class="text-sm text-sky-600">Harap kembalikan buku sebelum jatuh tempo.</p>
            </div>
        </div>
        @elseif($borrowing->status === 'Terlambat')
        <div class="bg-sky-50 px-8 py-4 border-b border-sky-100 flex items-center gap-3">
            <div class="p-2 bg-sky-100 rounded-full text-sky-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
            </div>
            <div>
                <h3 class="font-bold text-sky-800">Terlambat Dikembalikan!</h3>
                <p class="text-sm text-sky-600">Buku melewati batas waktu pengembalian. Segera lakukan pengembalian.</p>
            </div>
        </div>
        @endif

        <div class="p-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <!-- Info Peminjam & Buku -->
                <div class="space-y-8">
                    <div>
                        <h4 class="text-sm font-bold text-slate-900 uppercase tracking-wider mb-4 pb-2 border-b border-slate-100 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-sky-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            Data Anggota
                        </h4>
                        <div class="space-y-4">
                            <div>
                                <p class="text-xs text-slate-500 font-medium">Nama Peminjam</p>
                                <p class="font-semibold text-slate-800 text-lg">{{ $borrowing->member_name }}</p>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500 font-medium">NIM / ID Anggota</p>
                                <p class="font-mono text-slate-700 bg-slate-50 px-2 py-1 rounded-md inline-block mt-1">{{ $borrowing->member_nim }}</p>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h4 class="text-sm font-bold text-slate-900 uppercase tracking-wider mb-4 pb-2 border-b border-slate-100 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-sky-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                            Buku yang Dipinjam
                        </h4>
                        @if($borrowing->book)
                        <div class="flex items-start gap-4 p-4 bg-slate-50 rounded-xl border border-slate-100">
                            <div class="w-16 h-20 bg-sky-100 rounded flex-shrink-0 flex items-center justify-center text-sky-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                            </div>
                            <div>
                                <h5 class="font-bold text-slate-800 line-clamp-2">{{ $borrowing->book->title }}</h5>
                                <p class="text-sm text-slate-500 mt-1">Author: {{ $borrowing->book->author }}</p>
                                <a href="{{ route('books.show', $borrowing->book->id) }}" class="inline-block mt-2 text-xs font-semibold text-sky-600 hover:text-sky-800">
                                    Lihat Detail Buku &rarr;
                                </a>
                            </div>
                        </div>
                        @else
                        <div class="p-4 bg-sky-50 rounded-xl border border-sky-100 text-sky-600 text-sm font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                            Data buku ini telah dihapus dari sistem.
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Info Waktu & Denda -->
                <div class="space-y-8">
                    <div>
                        <h4 class="text-sm font-bold text-slate-900 uppercase tracking-wider mb-4 pb-2 border-b border-slate-100 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-sky-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            Waktu Transaksi
                        </h4>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-slate-50 p-4 rounded-xl border border-slate-100">
                                <p class="text-xs text-slate-500 font-medium mb-1">Tanggal Pinjam</p>
                                <p class="font-bold text-slate-800">{{ \Carbon\Carbon::parse($borrowing->borrow_date)->format('d M Y') }}</p>
                            </div>
                            <div class="bg-slate-50 p-4 rounded-xl border border-slate-100">
                                <p class="text-xs text-slate-500 font-medium mb-1">Jatuh Tempo</p>
                                <p class="font-bold text-slate-800">{{ \Carbon\Carbon::parse($borrowing->due_date)->format('d M Y') }}</p>
                            </div>
                        </div>

                        @if($borrowing->return_date)
                        <div class="mt-4 bg-slate-50 p-4 rounded-xl border border-slate-100 flex justify-between items-center">
                            <div>
                                <p class="text-xs text-slate-500 font-medium mb-1">Tanggal Dikembalikan</p>
                                <p class="font-bold text-slate-800">{{ \Carbon\Carbon::parse($borrowing->return_date)->format('d M Y') }}</p>
                            </div>
                            <div class="p-2 bg-white rounded-lg shadow-sm border border-slate-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                        </div>
                        @endif
                    </div>

                    @if($borrowing->fine > 0)
                    <div>
                        <h4 class="text-sm font-bold text-slate-900 uppercase tracking-wider mb-4 pb-2 border-b border-slate-100 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-sky-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Informasi Denda
                        </h4>
                        <div class="bg-sky-50 p-6 rounded-xl border border-sky-100 flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-sky-800 mb-1">Total Denda Keterlambatan</p>
                                <p class="text-3xl font-extrabold text-sky-600">Rp{{ number_format($borrowing->fine, 0, ',', '.') }}</p>
                            </div>
                            <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center shadow-sm border border-sky-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-sky-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
