@extends('layouts.public')

@section('content')
    <!-- Hero Section -->
    <div class="relative overflow-hidden rounded-[2rem] p-8 sm:p-12 lg:p-16 mb-12 text-white shadow-2xl"
         style="background: linear-gradient(135deg, #3b0014 0%, #6b0f25 45%, #3d0500 100%); box-shadow: 0 25px 50px -12px rgba(225,29,72,0.4);">
        <!-- Glow decorations -->
        <div class="absolute -top-32 -right-32 w-[30rem] h-[30rem] rounded-full blur-[100px]" style="background: radial-gradient(circle, rgba(225,29,72,0.6), transparent)"></div>
        <div class="absolute -bottom-24 -left-24 w-[25rem] h-[25rem] rounded-full blur-[80px]" style="background: radial-gradient(circle, rgba(245,158,11,0.4), transparent)"></div>
        
        <div class="relative z-10 max-w-3xl">
            <span class="inline-flex items-center gap-2 px-4 py-1.5 mb-6 text-xs font-bold tracking-widest uppercase rounded-full border backdrop-blur-sm"
                  style="background: rgba(255,255,255,0.1); border-color: rgba(255,255,255,0.2); color: #ffe4e6;">
                <span class="w-2 h-2 rounded-full bg-rose-400 animate-pulse"></span>
                Katalog Digital Publik
            </span>
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black tracking-tight mb-6 leading-tight">
                Eksplorasi Jendela <span style="background: linear-gradient(90deg, #fda4af, #fcd34d); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Dunia</span> Anda di Sini.
            </h1>
            <p class="text-rose-100/80 text-lg sm:text-xl font-light mb-8 max-w-2xl leading-relaxed">
                Cari koleksi buku terbaru, cek ketersediaan stok secara real-time, dan temukan referensi terbaik untuk kebutuhan belajar Anda tanpa harus mendaftar akun.
            </p>
            
            <a href="#katalog" class="inline-flex items-center justify-center px-8 py-4 text-base font-bold text-rose-950 bg-white rounded-2xl shadow-[0_0_40px_rgba(255,255,255,0.3)] hover:scale-105 transition-transform duration-300">
                Lihat Koleksi Buku
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 text-rose-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                </svg>
            </a>
        </div>
        
        <!-- Abstract Book Illustration (CSS generated) -->
        <div class="hidden lg:block absolute right-16 bottom-0 opacity-80 mix-blend-overlay">
            <svg width="300" height="300" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="0.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
            </svg>
        </div>
    </div>

    <!-- Info Banner -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-16">
        <div class="bg-white rounded-3xl p-6 border border-rose-100 shadow-sm flex items-start gap-4 hover:shadow-md transition-shadow">
            <div class="w-12 h-12 rounded-2xl flex items-center justify-center bg-rose-50 flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-rose-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            <div>
                <h3 class="font-bold text-slate-800 text-lg mb-1">Cari Kapan Saja</h3>
                <p class="text-sm text-slate-500 leading-relaxed">Cari judul buku atau penulis dari mana saja melalui perangkat Anda.</p>
            </div>
        </div>
        <div class="bg-white rounded-3xl p-6 border border-rose-100 shadow-sm flex items-start gap-4 hover:shadow-md transition-shadow">
            <div class="w-12 h-12 rounded-2xl flex items-center justify-center bg-rose-50 flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-rose-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div>
                <h3 class="font-bold text-slate-800 text-lg mb-1">Status Real-time</h3>
                <p class="text-sm text-slate-500 leading-relaxed">Stok buku langsung terhubung dengan sistem pusat perpustakaan.</p>
            </div>
        </div>
        <div class="bg-white rounded-3xl p-6 border border-rose-100 shadow-sm flex items-start gap-4 hover:shadow-md transition-shadow">
            <div class="w-12 h-12 rounded-2xl flex items-center justify-center bg-rose-50 flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-rose-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
            </div>
            <div>
                <h3 class="font-bold text-slate-800 text-lg mb-1">Pinjam Langsung</h3>
                <p class="text-sm text-slate-500 leading-relaxed">Temukan buku yang tersedia lalu kunjungi perpustakaan fisik kami.</p>
            </div>
        </div>
    </div>

    <!-- Catalog Section -->
    <div id="katalog" class="scroll-mt-32">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-8">
            <div>
                <h2 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">Katalog Buku</h2>
                <div class="w-20 h-1.5 bg-rose-500 rounded-full mt-3"></div>
            </div>

            <!-- Search & Filter Form -->
            <form action="{{ route('landing.index') }}#katalog" method="GET" class="w-full md:w-auto flex flex-col sm:flex-row items-center gap-3">
                <select name="category" onchange="this.form.submit()" class="w-full sm:w-auto px-4 py-3 bg-white border border-rose-200 rounded-xl text-sm font-medium text-slate-700 focus:ring-2 focus:ring-rose-500 focus:border-rose-500 cursor-pointer shadow-sm">
                    <option value="">Semua Kategori</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                    @endforeach
                </select>

                <div class="relative w-full sm:w-72">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input type="text" name="search" value="{{ request('search') }}" 
                           class="block w-full pl-11 pr-4 py-3 bg-white border border-rose-200 rounded-xl text-sm placeholder-slate-400 focus:ring-2 focus:ring-rose-500 focus:border-rose-500 shadow-sm transition-shadow" 
                           placeholder="Ketik judul buku atau penulis...">
                </div>

                <button type="submit" class="hidden sm:block px-6 py-3 bg-rose-600 text-white text-sm font-bold rounded-xl hover:bg-rose-700 shadow-md transition-colors">
                    Cari
                </button>
            </form>
        </div>

        @if(request('search') || request('category'))
        <div class="mb-6 flex items-center justify-between bg-white px-5 py-3 rounded-xl border border-rose-100 shadow-sm">
            <p class="text-sm font-medium text-slate-600">
                Menampilkan hasil pencarian untuk: 
                @if(request('search')) <span class="font-bold text-rose-600">"{{ request('search') }}"</span> @endif
                @if(request('search') && request('category')) dan @endif
                @if(request('category')) kategori <span class="font-bold text-rose-600">"{{ request('category') }}"</span> @endif
            </p>
            <a href="{{ route('landing.index') }}#katalog" class="text-sm font-semibold text-rose-500 hover:text-rose-700">Reset Filter</a>
        </div>
        @endif

        <!-- Book Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-12">
            @forelse($books as $book)
            <div class="bg-white rounded-2xl border border-rose-100 overflow-hidden hover:shadow-[0_8px_30px_rgb(0,0,0,0.08)] hover:-translate-y-1 transition-all duration-300 group flex flex-col h-full">
                <!-- Book Cover Placeholder -->
                <div class="h-48 bg-slate-100 flex-shrink-0 relative overflow-hidden border-b border-slate-100">
                    <div class="absolute inset-0 bg-gradient-to-br from-rose-50 to-amber-50 opacity-50"></div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-rose-200 group-hover:scale-110 transition-transform duration-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    
                    <!-- Status Badge -->
                    <div class="absolute top-3 right-3">
                        @if($book->stock > 0)
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-bold bg-emerald-500 text-white shadow-sm">
                                <span class="w-1.5 h-1.5 rounded-full bg-white animate-pulse"></span>
                                Tersedia
                            </span>
                        @else
                            <span class="inline-flex items-center px-3 py-1.5 rounded-lg text-xs font-bold bg-slate-800 text-white shadow-sm">
                                Habis
                            </span>
                        @endif
                    </div>
                </div>

                <div class="p-5 flex-grow flex flex-col">
                    <div class="mb-auto">
                        <span class="inline-block px-2.5 py-1 mb-3 text-[10px] font-bold uppercase tracking-wider rounded-md bg-rose-50 text-rose-600 border border-rose-100">
                            {{ $book->category ?? 'Umum' }}
                        </span>
                        <h3 class="text-lg font-bold text-slate-800 mb-1 line-clamp-2 leading-tight group-hover:text-rose-600 transition-colors">
                            {{ $book->title }}
                        </h3>
                        <p class="text-sm font-medium text-slate-500 mb-4 line-clamp-1">
                            Oleh: {{ $book->author }}
                        </p>
                    </div>

                    <div class="pt-4 mt-4 border-t border-slate-100 flex items-center justify-between">
                        <div class="text-xs text-slate-400 font-mono">
                            ISBN: {{ $book->isbn }}
                        </div>
                        <div class="text-sm font-bold {{ $book->stock > 0 ? 'text-emerald-600' : 'text-slate-400' }}">
                            {{ $book->stock }} Stok
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full py-20 bg-white rounded-3xl border border-rose-100 text-center shadow-sm">
                <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-rose-50 mb-6">
                    <svg class="h-10 w-10 text-rose-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-2">Buku Tidak Ditemukan</h3>
                <p class="text-slate-500 max-w-md mx-auto">
                    Maaf, kami tidak dapat menemukan buku yang cocok dengan kriteria pencarian Anda. Coba gunakan kata kunci atau kategori lain.
                </p>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($books->hasPages())
        <div class="mt-8 flex justify-center">
            {{ $books->links() }}
        </div>
        @endif
    </div>

    <!-- Library Information & Location Section -->
    <div class="mt-20 mb-12">
        <div class="flex flex-col items-center text-center mb-10">
            <h2 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">Informasi & Lokasi Perpustakaan</h2>
            <div class="w-20 h-1.5 bg-rose-500 rounded-full mt-4"></div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 bg-white p-6 sm:p-8 rounded-3xl border border-rose-100 shadow-sm">
            <!-- Information side -->
            <div class="flex flex-col gap-8 justify-center">
                <!-- Jam Operasional -->
                <div class="flex items-start gap-5 hover:translate-x-1 transition-transform duration-300">
                    <div class="w-14 h-14 rounded-2xl flex items-center justify-center bg-rose-50 text-rose-600 flex-shrink-0 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-800 text-lg mb-2">Jam Operasional</h3>
                        <ul class="text-sm text-slate-600 space-y-1.5 font-medium">
                            <li class="flex items-center gap-2">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                Senin - Jumat : 08:00 - 16:00 WIB
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                                Sabtu : 09:00 - 14:00 WIB
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                                Minggu & Libur Nasional : Tutup
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Kontak -->
                <div class="flex items-start gap-5 hover:translate-x-1 transition-transform duration-300">
                    <div class="w-14 h-14 rounded-2xl flex items-center justify-center bg-rose-50 text-rose-600 flex-shrink-0 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-800 text-lg mb-2">Kontak Kami</h3>
                        <ul class="text-sm text-slate-600 space-y-1.5 font-medium">
                            <li class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                info@perpustakaan.com
                            </li>
                            <li class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                (021) 1234-5678
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Aturan -->
                <div class="flex items-start gap-5 hover:translate-x-1 transition-transform duration-300">
                    <div class="w-14 h-14 rounded-2xl flex items-center justify-center bg-rose-50 text-rose-600 flex-shrink-0 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-800 text-lg mb-2">Informasi Penting</h3>
                        <ul class="text-sm text-slate-600 space-y-1.5 font-medium list-disc list-inside">
                            <li>Maksimal peminjaman 3 buku per anggota.</li>
                            <li>Durasi peminjaman maksimal 7 hari.</li>
                            <li>Keterlambatan dikenakan denda sesuai ketentuan.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Maps side -->
            <div class="rounded-2xl overflow-hidden h-64 lg:h-full min-h-[350px] border border-rose-100 shadow-inner relative group">
                <div class="absolute inset-0 bg-slate-100 animate-pulse -z-10"></div>
                <!-- Menggunakan embed maps Perpustakaan Nasional sebagai contoh -->
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126920.24009653519!2d106.759496!3d-6.2297419!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e945e34b9d%3A0x100c5e82dd4b820!2sPerpustakaan%20Nasional%20Republik%20Indonesia!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" 
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade"
                        class="group-hover:scale-[1.02] transition-transform duration-700">
                </iframe>
            </div>
        </div>
    </div>
@endsection
