@extends('layouts.app')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <div class="flex items-center gap-4">
        <a href="{{ route('books.index') }}" class="p-2 bg-white text-slate-500 hover:text-sky-600 rounded-lg border border-slate-200 shadow-sm hover:border-sky-200 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Detail Buku</h1>
        </div>
    </div>
    
    <div class="flex gap-2">
        <a href="{{ route('books.edit', $book->id) }}" class="inline-flex items-center px-4 py-2 bg-white border border-slate-200 rounded-lg text-sm font-semibold text-slate-700 hover:bg-slate-50 hover:text-sky-600 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
            </svg>
            Edit Data
        </a>
    </div>
</div>

<div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
    <div class="p-8 md:p-10 flex flex-col md:flex-row gap-10">
        <!-- Kolom Cover Visual (Dummy) -->
        <div class="w-full md:w-1/3 flex flex-col items-center">
            @if($book->image)
                <div class="w-48 md:w-64 mb-6 shadow-md rounded-xl overflow-hidden border border-slate-200">
                    <img src="{{ asset('storage/' . $book->image) }}" alt="Cover {{ $book->title }}" class="w-full h-auto object-cover">
                </div>
            @else
                <div class="w-48 h-64 md:w-64 md:h-80 bg-sky-50 border-2 border-dashed border-sky-200 rounded-xl flex items-center justify-center text-sky-300 shadow-inner mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
            @endif
            
            <div class="w-full flex justify-center gap-3">
                <div class="text-center bg-slate-50 px-6 py-3 rounded-xl border border-slate-100">
                    <p class="text-xs text-slate-500 font-medium mb-1">Stok Tersedia</p>
                    <p class="text-2xl font-bold text-slate-800">{{ $book->stock }}</p>
                </div>
            </div>
        </div>

        <!-- Kolom Informasi Lengkap -->
        <div class="w-full md:w-2/3">
            <div class="mb-6">
                <div class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-semibold bg-sky-50 text-sky-700 border border-sky-100 mb-4">
                    {{ $book->category ?? 'Tidak Berkategori' }}
                </div>
                <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight mb-2">{{ $book->title }}</h2>
                <p class="text-lg text-slate-500">Oleh <span class="font-semibold text-slate-700">{{ $book->author }}</span></p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-8 bg-slate-50 rounded-xl p-6 border border-slate-100">
                <div>
                    <h4 class="text-xs uppercase tracking-wider font-semibold text-slate-400 mb-1">Nomor ISBN</h4>
                    <p class="font-mono text-slate-800">{{ $book->isbn }}</p>
                </div>
                <div>
                    <h4 class="text-xs uppercase tracking-wider font-semibold text-slate-400 mb-1">Penerbit</h4>
                    <p class="text-slate-800">{{ $book->publisher ?? '-' }}</p>
                </div>
                <div>
                    <h4 class="text-xs uppercase tracking-wider font-semibold text-slate-400 mb-1">Tahun Terbit</h4>
                    <p class="text-slate-800">{{ $book->year ?? '-' }}</p>
                </div>
                <div>
                    <h4 class="text-xs uppercase tracking-wider font-semibold text-slate-400 mb-1">Status Ketersediaan</h4>
                    @if($book->stock > 5)
                        <span class="inline-flex items-center gap-1.5 text-sm font-bold text-emerald-600">
                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span> Tersedia
                        </span>
                    @elseif($book->stock > 0 && $book->stock <= 5)
                        <span class="inline-flex items-center gap-1.5 text-sm font-bold text-amber-600">
                            <span class="w-2 h-2 rounded-full bg-amber-500"></span> Stok Sedikit
                        </span>
                    @else
                        <span class="inline-flex items-center gap-1.5 text-sm font-bold text-sky-600">
                            <span class="w-2 h-2 rounded-full bg-sky-400"></span> Habis
                        </span>
                    @endif
                </div>
            </div>

            <div>
                <h4 class="text-lg font-bold text-slate-800 mb-3 border-b border-slate-200 pb-2">Deskripsi Buku</h4>
                <div class="pteal psky-slate psky-sm">
                    @if($book->description)
                        <p class="text-slate-600 leading-relaxed">{{ $book->description }}</p>
                    @else
                        <p class="text-slate-400 italic">Belum ada deskripsi untuk buku ini.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
