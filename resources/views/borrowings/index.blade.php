@extends('layouts.app')

@section('content')
<div class="mb-8 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
    <div>
        <h1 class="text-3xl font-bold text-slate-900 tracking-tight">Data Peminjaman</h1>
        <p class="text-slate-500 mt-1">Kelola data peminjaman dan pengembalian buku.</p>
    </div>
    <a href="{{ route('borrowings.create') }}" class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-semibold text-white bg-indigo-600 rounded-lg shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
        </svg>
        Tambah Peminjaman
    </a>
</div>

@if(session('success'))
<div class="mb-6 bg-emerald-50 border border-emerald-200 p-4 rounded-lg flex items-center gap-3">
    <div class="bg-emerald-100 p-1.5 rounded-full">
        <svg class="h-5 w-5 text-emerald-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
        </svg>
    </div>
    <p class="text-emerald-800 font-medium text-sm">{{ session('success') }}</p>
</div>
@endif

@if(session('error'))
<div class="mb-6 bg-rose-50 border border-rose-200 p-4 rounded-lg flex items-center gap-3">
    <div class="bg-rose-100 p-1.5 rounded-full">
        <svg class="h-5 w-5 text-rose-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
        </svg>
    </div>
    <p class="text-rose-800 font-medium text-sm">{{ session('error') }}</p>
</div>
@endif

<div class="bg-white shadow-sm border border-slate-200 rounded-xl overflow-hidden">
    <!-- Header Tabel & Pencarian -->
    <div class="px-6 py-4 border-b border-slate-200 bg-slate-50/50 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div class="flex items-center gap-3">
            <h3 class="font-semibold text-slate-800">Daftar Transaksi</h3>
        </div>
        
        <!-- Form Pencarian & Filter -->
        <form action="{{ route('borrowings.index') }}" method="GET" class="w-full md:w-auto flex flex-col md:flex-row items-center gap-2">
            <!-- Filter Status -->
            <select name="status" onchange="this.form.submit()" class="w-full md:w-auto block px-3 py-2 border border-slate-300 rounded-lg text-sm text-slate-700 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 bg-white transition-colors cursor-pointer">
                <option value="">Semua Status</option>
                <option value="Dipinjam" {{ request('status') == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                <option value="Dikembalikan" {{ request('status') == 'Dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                <option value="Terlambat" {{ request('status') == 'Terlambat' ? 'selected' : '' }}>Terlambat</option>
            </select>

            <div class="relative w-full md:w-64">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-4 w-4 text-slate-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <input type="text" name="search" value="{{ request('search') }}" class="block w-full pl-10 pr-3 py-2 border border-slate-300 rounded-lg text-sm placeholder-slate-400 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 transition-colors" placeholder="Cari nama/NIM...">
            </div>
            
            @if(request('search') || request('status'))
                <a href="{{ route('borrowings.index') }}" class="p-2 text-slate-400 hover:text-rose-500 transition-colors" title="Hapus Filter">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
            @else
                <button type="submit" class="px-4 py-2 bg-slate-800 text-white text-sm font-medium rounded-lg hover:bg-slate-700 transition-colors">Cari</button>
            @endif
        </form>
    </div>

    <!-- Tabel Data -->
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-white border-b border-slate-200 text-xs text-slate-500 uppercase tracking-wider font-semibold">
                    <th class="px-4 py-4">Peminjam</th>
                    <th class="px-4 py-4">Buku</th>
                    <th class="px-4 py-4">Tgl Pinjam</th>
                    <th class="px-4 py-4">Jatuh Tempo</th>
                    <th class="px-4 py-4 text-center">Status</th>
                    <th class="px-4 py-4 text-right">Tindakan</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 text-sm whitespace-nowrap">
                @forelse($borrowings as $borrowing)
                <tr class="hover:bg-slate-50 transition-colors group">
                    <td class="px-4 py-3">
                        <div class="font-bold text-slate-900">{{ $borrowing->member_name }}</div>
                        <div class="text-xs text-slate-500 mt-0.5">NIM: {{ $borrowing->member_nim }}</div>
                    </td>
                    <td class="px-4 py-3">
                        <div class="font-medium text-slate-700 whitespace-normal min-w-[150px] max-w-[200px] line-clamp-2" title="{{ $borrowing->book->title ?? 'Buku Dihapus' }}">
                            {{ $borrowing->book->title ?? 'Buku Dihapus' }}
                        </div>
                    </td>
                    <td class="px-4 py-3 text-slate-600">
                        {{ \Carbon\Carbon::parse($borrowing->borrow_date)->format('d M Y') }}
                    </td>
                    <td class="px-4 py-3 text-slate-600">
                        {{ \Carbon\Carbon::parse($borrowing->due_date)->format('d M Y') }}
                        @if($borrowing->status === 'Dipinjam' && \Carbon\Carbon::now()->startOfDay()->gt(\Carbon\Carbon::parse($borrowing->due_date)->startOfDay()))
                            <span class="ml-1 text-[10px] font-bold text-rose-500">(Telat)</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 text-center">
                        @if($borrowing->status === 'Dikembalikan')
                            <span class="inline-flex items-center gap-1.5 px-2 py-1 rounded-md text-[11px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-100">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Dikembalikan
                            </span>
                        @elseif($borrowing->status === 'Dipinjam')
                            <span class="inline-flex items-center gap-1.5 px-2 py-1 rounded-md text-[11px] font-bold bg-indigo-50 text-indigo-700 border border-indigo-100">
                                <span class="w-1.5 h-1.5 rounded-full bg-indigo-500"></span> Dipinjam
                            </span>
                        @elseif($borrowing->status === 'Terlambat')
                            <span class="inline-flex items-center gap-1.5 px-2 py-1 rounded-md text-[11px] font-bold bg-rose-50 text-rose-700 border border-rose-100">
                                <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span> Terlambat
                            </span>
                        @endif
                        
                        @if($borrowing->fine > 0)
                            <div class="text-[10px] text-rose-500 font-medium mt-1">
                                Denda: Rp{{ number_format($borrowing->fine, 0, ',', '.') }}
                            </div>
                        @endif
                    </td>
                    <td class="px-4 py-3 text-right">
                        <div class="flex justify-end gap-2">
                            <a href="{{ route('borrowings.edit', $borrowing->id) }}" class="p-2 text-indigo-600 hover:bg-indigo-50 rounded-md transition-colors border border-transparent hover:border-indigo-100" title="Detail / Update Status">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>
                            <form action="{{ route('borrowings.destroy', $borrowing->id) }}" method="POST" class="inline-block delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn-delete p-2 text-rose-600 hover:bg-rose-50 rounded-md transition-colors border border-transparent hover:border-rose-100" title="Hapus">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-6 py-16 text-center">
                        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-slate-100 mb-4">
                            <svg class="h-8 w-8 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </div>
                        <h3 class="text-base font-semibold text-slate-900 mb-1">
                            Data Kosong
                        </h3>
                        <p class="text-sm text-slate-500 mb-4">
                            Belum ada data peminjaman yang dicatat.
                        </p>
                        <a href="{{ route('borrowings.create') }}" class="inline-flex items-center text-sm font-medium text-indigo-600 hover:text-indigo-700">
                            Buat Peminjaman Baru
                        </a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Paginasi -->
    @if($borrowings->hasPages())
    <div class="px-6 py-4 border-t border-slate-200 bg-white">
        {{ $borrowings->links() }}
    </div>
    @endif
</div>
@endsection

@stack('scripts')
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.btn-delete');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const form = this.closest('form');
                
                Swal.fire({
                    title: 'Hapus Data?',
                    text: "Data peminjaman ini akan dihapus permanen. Jika buku belum dikembalikan, stok akan otomatis dikembalikan.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#ef4444',
                    cancelButtonColor: '#64748b',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal',
                    customClass: {
                        popup: 'rounded-2xl',
                        confirmButton: 'rounded-lg font-medium px-5',
                        cancelButton: 'rounded-lg font-medium px-5'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    });
</script>
@endpush
