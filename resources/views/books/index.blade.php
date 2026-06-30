@extends('layouts.app')

@section('content')
<div class="relative overflow-hidden rounded-2xl p-8 sm:p-10 mb-8 text-white"
     style="background: linear-gradient(135deg, #3b0014 0%, #6b0f25 45%, #3d0500 100%); box-shadow: 0 20px 60px -10px rgba(225,29,72,0.5);">
    <div class="absolute -top-16 -right-16 w-72 h-72 rounded-full blur-3xl" style="background: radial-gradient(circle, rgba(225,29,72,0.5), transparent)"></div>
    <div class="absolute -bottom-16 -left-8 w-64 h-64 rounded-full blur-3xl" style="background: radial-gradient(circle, rgba(245,158,11,0.35), transparent)"></div>

    <div class="relative z-10 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <h1 class="text-3xl sm:text-4xl font-black tracking-tight mb-2">Koleksi Buku</h1>
            <p class="text-rose-200/70 text-base font-light max-w-xl">Kelola data buku yang tersedia di perpustakaan Anda.</p>
        </div>
        <a href="{{ route('books.create') }}" class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-semibold text-rose-900 bg-gradient-to-r from-rose-200 to-rose-300 rounded-xl shadow-lg hover:from-rose-300 hover:to-rose-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500 transition-all hover:-translate-y-0.5">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            Tambah Buku Baru
        </a>
    </div>
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

<div class="bg-white rounded-2xl border border-rose-100 shadow-sm overflow-hidden">
    <!-- Header Tabel & Pencarian -->
    <div class="px-6 py-4 border-b border-rose-50 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div class="flex items-center gap-3">
            <h3 class="font-bold text-slate-900">Daftar Buku Terbaru</h3>
            <span class="bg-rose-50 text-rose-700 text-xs font-semibold px-2.5 py-1 rounded-md border border-rose-100">{{ $books->total() }} Total Buku</span>
        </div>
        
        <!-- Form Pencarian -->
        <!-- Form Pencarian & Filter -->
        <form action="{{ route('books.index') }}" method="GET" class="w-full md:w-auto flex flex-col md:flex-row items-center gap-2">
            <!-- Filter Kategori -->
            <select name="category" onchange="this.form.submit()" class="w-full md:w-auto block px-3 py-2 border border-rose-200 rounded-xl text-sm text-slate-700 focus:outline-none focus:ring-1 focus:ring-rose-500 focus:border-rose-500 bg-white transition-colors cursor-pointer">
                <option value="">Semua Kategori</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                @endforeach
            </select>

            <div class="relative w-full md:w-64">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-4 w-4 text-slate-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <input type="text" name="search" value="{{ request('search') }}" class="block w-full pl-10 pr-3 py-2 border border-rose-200 rounded-xl text-sm placeholder-slate-400 focus:outline-none focus:ring-1 focus:ring-rose-500 focus:border-rose-500 transition-colors" placeholder="Cari judul...">
            </div>
            
            @if(request('search') || request('category'))
                <a href="{{ route('books.index') }}" class="p-2 text-slate-400 hover:text-rose-500 transition-colors" title="Hapus Filter">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
            @else
                <button type="submit" class="px-4 py-2 bg-slate-800 text-white text-sm font-medium rounded-xl hover:bg-slate-700 transition-colors">Cari</button>
            @endif
        </form>
    </div>

    <!-- Tabel Data -->
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-rose-50/40 text-[11px] text-slate-400 uppercase tracking-widest font-semibold border-b border-rose-50">
                    <th class="px-4 py-4">Judul</th>
                    <th class="px-4 py-4">Penulis</th>
                    <th class="px-4 py-4">Kategori</th>
                    <th class="px-4 py-4 text-center">Stok</th>
                    <th class="px-4 py-4 text-center">Status</th>
                    <th class="px-4 py-4 text-right">Tindakan</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-rose-50 text-sm whitespace-nowrap">
                @forelse($books as $book)
                <tr class="hover:bg-rose-50/30 transition-colors">
                    <td class="px-4 py-3">
                        <div class="font-bold text-slate-900 whitespace-normal min-w-[150px] max-w-[250px] line-clamp-2" title="{{ $book->title }}">{{ $book->title }}</div>
                        <div class="font-mono text-[10px] text-slate-400 mt-0.5">ISBN: {{ $book->isbn }}</div>
                    </td>
                    <td class="px-4 py-3 text-slate-600">{{ $book->author }}</td>
                    <td class="px-4 py-3">
                        <span class="px-2.5 py-1 text-[11px] font-medium rounded-md bg-slate-100 text-slate-700 border border-slate-200">
                            {{ $book->category ?? '-' }}
                        </span>
                    </td>
                    <td class="px-4 py-3 text-center font-bold text-slate-700">{{ $book->stock }}</td>
                    <td class="px-4 py-3 text-center">
                        @if($book->stock > 5)
                            <span class="inline-flex items-center gap-1.5 px-2 py-1 rounded-md text-[11px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-100">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 shadow-[0_0_4px_rgba(16,185,129,0.5)]"></span>
                                Tersedia
                            </span>
                        @elseif($book->stock > 0 && $book->stock <= 5)
                            <span class="inline-flex items-center gap-1.5 px-2 py-1 rounded-md text-[11px] font-bold bg-amber-50 text-amber-700 border border-amber-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-amber-500 shadow-[0_0_4px_rgba(245,158,11,0.5)]"></span>
                                Stok Sedikit
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1.5 px-2 py-1 rounded-md text-[11px] font-bold bg-rose-50 text-rose-700 border border-rose-100">
                                <span class="w-1.5 h-1.5 rounded-full bg-rose-500 shadow-[0_0_4px_rgba(244,63,94,0.5)]"></span>
                                Habis
                            </span>
                        @endif
                    </td>
                    <td class="px-4 py-3 text-right">
                        <div class="flex justify-end gap-2">
                            <a href="{{ route('books.show', $book->id) }}" class="p-2 text-slate-500 hover:text-indigo-600 hover:bg-indigo-50 rounded-md transition-colors border border-transparent hover:border-indigo-100" title="Detail">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </a>
                            <a href="{{ route('books.edit', $book->id) }}" class="p-2 text-indigo-600 hover:bg-indigo-50 rounded-md transition-colors border border-transparent hover:border-indigo-100" title="Edit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                            </a>
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="inline-block delete-form">
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
                            @if(request('search') || request('category'))
                            <svg class="h-8 w-8 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                            @else
                            <svg class="h-8 w-8 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            @endif
                        </div>
                        <h3 class="text-base font-semibold text-slate-900 mb-1">
                            {{ (request('search') || request('category')) ? 'Buku Tidak Ditemukan' : 'Data Kosong' }}
                        </h3>
                        <p class="text-sm text-slate-500 mb-4">
                            {{ (request('search') || request('category')) ? 'Tidak ada buku yang cocok dengan filter Anda.' : 'Belum ada buku yang ditambahkan.' }}
                        </p>
                        @if(!(request('search') || request('category')))
                        <a href="{{ route('books.create') }}" class="inline-flex items-center text-sm font-medium text-indigo-600 hover:text-indigo-700">
                            Tambah Buku Pertama
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                        @else
                        <a href="{{ route('books.index') }}" class="inline-flex items-center text-sm font-medium text-indigo-600 hover:text-indigo-700">
                            Hapus Filter Pencarian
                        </a>
                        @endif
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Paginasi -->
    @if($books->hasPages())
    <div class="px-6 py-4 border-t border-slate-200 bg-white">
        {{ $books->links() }}
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
                    title: 'Hapus Buku?',
                    text: "Data buku ini akan dihapus permanen dan tidak dapat dikembalikan!",
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
