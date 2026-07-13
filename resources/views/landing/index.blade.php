@extends('layouts.public')

@section('content')
    <!-- Fixed Background behind cards -->
    <div class="fixed inset-0 z-[-1] bg-cover bg-center bg-no-repeat"
        style="background-image: url('{{ asset('images/pnp.png') }}');">
        <div class="absolute inset-0 bg-[#fffbf7]/90 backdrop-blur-sm"></div>
    </div>

    <!-- Hero Section -->
    <div class="relative overflow-hidden rounded-[2rem] p-8 sm:p-12 lg:p-16 mb-12 shadow-2xl"
        style="background: #ffbe91; box-shadow: 0 25px 50px -12px rgba(127,50,15,0.3);">
        <!-- Glow decorations -->
        <div class="absolute -top-32 -right-32 w-[30rem] h-[30rem] rounded-full blur-[100px] z-0"
            style="background: transparent"></div>
        <div class="absolute -bottom-24 -left-24 w-[25rem] h-[25rem] rounded-full blur-[80px] z-0"
            style="background: transparent"></div>

        <div class="relative z-10 max-w-3xl">
            <span
                class="inline-flex items-center gap-2 px-4 py-2 text-xs font-bold tracking-widest uppercase rounded-full border mb-6"
                style="background: rgba(77, 51, 32, 0.1); border-color: rgba(77, 51, 32, 0.2); color: #4d3320;">
                <span class="w-2 h-2 rounded-full bg-sky-600 animate-pulse"></span>
                Katalog Digital Publik
            </span>
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black tracking-tight mb-6 leading-tight text-slate-900">
                Eksplorasi Jendela Dunia Anda Di Politeknik Negeri Padang.
            </h1>
            <p class="text-slate-800 text-lg sm:text-xl font-medium mb-8 max-w-2xl leading-relaxed">
                Cari koleksi buku terbaru, cek ketersediaan stok secara real-time, dan temukan referensi terbaik untuk
                kebutuhan belajar Anda tanpa harus mendaftar akun.
            </p>

            <a href="#katalog"
                class="inline-flex items-center justify-center px-8 py-4 text-base font-bold text-sky-950 bg-white rounded-2xl shadow-[0_0_40px_rgba(255,255,255,0.5)] hover:scale-105 transition-transform duration-300 border border-slate-100">
                Lihat Koleksi Buku
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 text-sky-600" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                </svg>
            </a>
        </div>

        <!-- Abstract Book Illustration (CSS generated) -->
        <div class="hidden lg:block absolute right-16 bottom-0 opacity-40 mix-blend-multiply">
            <svg width="300" height="300" viewBox="0 0 24 24" fill="none" stroke="#7f320f" stroke-width="0.5"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
            </svg>
        </div>
    </div>

    <!-- Info Banner -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-16">
        <div
            class="bg-white rounded-3xl p-6 border border-sky-100 shadow-sm flex items-start gap-4 hover:shadow-md transition-shadow">
            <div class="w-12 h-12 rounded-2xl flex items-center justify-center bg-sky-50 flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-sky-600" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            <div>
                <h3 class="font-bold text-slate-800 text-lg mb-1">Cari Kapan Saja</h3>
                <p class="text-sm text-slate-500 leading-relaxed">Cari judul buku atau penulis dari mana saja melalui
                    perangkat Anda.</p>
            </div>
        </div>
        <div
            class="bg-white rounded-3xl p-6 border border-sky-100 shadow-sm flex items-start gap-4 hover:shadow-md transition-shadow">
            <div class="w-12 h-12 rounded-2xl flex items-center justify-center bg-sky-50 flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-sky-600" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div>
                <h3 class="font-bold text-slate-800 text-lg mb-1">Status Real-time</h3>
                <p class="text-sm text-slate-500 leading-relaxed">Stok buku langsung terhubung dengan sistem pusat
                    perpustakaan.</p>
            </div>
        </div>
        <div
            class="bg-white rounded-3xl p-6 border border-sky-100 shadow-sm flex items-start gap-4 hover:shadow-md transition-shadow">
            <div class="w-12 h-12 rounded-2xl flex items-center justify-center bg-sky-50 flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-sky-600" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
            </div>
            <div>
                <h3 class="font-bold text-slate-800 text-lg mb-1">Pinjam Langsung</h3>
                <p class="text-sm text-slate-500 leading-relaxed">Temukan buku yang tersedia lalu kunjungi perpustakaan
                    fisik kami.</p>
            </div>
        </div>
    </div>

    <!-- Catalog Section -->
    <div id="katalog" class="scroll-mt-32">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-8">
            <div>
                <h2 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">Katalog Buku</h2>
                <div class="w-20 h-1.5 bg-sky-400 rounded-full mt-3"></div>
            </div>

            <!-- Search & Filter Form -->
            <form action="{{ route('landing.index') }}#katalog" method="GET"
                class="w-full md:w-auto flex flex-col sm:flex-row items-center gap-3">
                <select name="category" onchange="this.form.submit()"
                    class="w-full sm:w-auto px-4 py-3 bg-white border border-sky-200 rounded-xl text-sm font-medium text-slate-700 focus:ring-2 focus:ring-sky-500 focus:border-sky-500 cursor-pointer shadow-sm">
                    <option value="">Semua Kategori</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                    @endforeach
                </select>

                <div class="relative w-full sm:w-72">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-slate-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input type="text" name="search" value="{{ request('search') }}"
                        class="block w-full pl-11 pr-4 py-3 bg-white border border-sky-200 rounded-xl text-sm placeholder-slate-400 focus:ring-2 focus:ring-sky-500 focus:border-sky-500 shadow-sm transition-shadow"
                        placeholder="Ketik judul buku atau penulis...">
                </div>

                <button type="submit"
                    class="hidden sm:block px-6 py-3 bg-sky-500 text-white text-sm font-bold rounded-xl hover:bg-sky-600 shadow-md transition-colors">
                    Cari
                </button>
            </form>
        </div>

        @if(request('search') || request('category'))
            <div class="mb-6 flex items-center justify-between bg-white px-5 py-3 rounded-xl border border-sky-100 shadow-sm">
                <p class="text-sm font-medium text-slate-600">
                    Menampilkan hasil pencarian untuk:
                    @if(request('search')) <span class="font-bold text-sky-600">"{{ request('search') }}"</span> @endif
                    @if(request('search') && request('category')) dan @endif
                    @if(request('category')) kategori <span class="font-bold text-sky-600">"{{ request('category') }}"</span>
                    @endif
                </p>
                <a href="{{ route('landing.index') }}#katalog"
                    class="text-sm font-semibold text-sky-500 hover:text-sky-700">Reset Filter</a>
            </div>
        @endif

        <!-- Book Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-12">
            @forelse($books as $book)
                <div
                    class="bg-white rounded-2xl border border-sky-100 overflow-hidden hover:shadow-[0_8px_30px_rgb(0,0,0,0.08)] hover:-translate-y-1 transition-all duration-300 group flex flex-col h-full">
                    <!-- Book Cover/Visual -->
                    <div
                        class="h-48 md:h-56 bg-sky-50 relative p-4 flex items-center justify-center overflow-hidden border-b border-sky-100 group-hover:bg-sky-100 transition-colors">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-slate-900/40 to-transparent z-10 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        </div>

                        @if($book->image)
                            <img src="{{ asset('storage/' . $book->image) }}" alt="Cover {{ $book->title }}"
                                class="w-full h-full object-cover rounded shadow-sm z-0 relative group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div
                                class="w-24 h-32 bg-white rounded shadow-sm flex items-center justify-center text-sky-200 border border-sky-100 z-0 relative group-hover:scale-105 transition-transform duration-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                            </div>
                        @endif

                        <!-- Status Badge -->
                        <div class="absolute top-3 right-3 z-20">
                            @if($book->stock > 0)
                                <span
                                    class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-bold bg-emerald-500 text-white shadow-sm">
                                    <span class="w-1.5 h-1.5 rounded-full bg-white animate-pulse"></span>
                                    Tersedia
                                </span>
                            @else
                                <span
                                    class="inline-flex items-center px-3 py-1.5 rounded-lg text-xs font-bold bg-slate-800 text-white shadow-sm">
                                    Habis
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="p-5 flex-grow flex flex-col">
                        <div class="mb-auto">
                            <span
                                class="inline-block px-2.5 py-1 mb-3 text-[10px] font-bold uppercase tracking-wider rounded-md bg-sky-50 text-sky-600 border border-sky-100">
                                {{ $book->category ?? 'Umum' }}
                            </span>
                            <h3
                                class="text-lg font-bold text-slate-800 mb-1 line-clamp-2 leading-tight group-hover:text-sky-600 transition-colors">
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
                <div class="col-span-full py-20 bg-white rounded-3xl border border-sky-100 text-center shadow-sm">
                    <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-sky-50 mb-6">
                        <svg class="h-10 w-10 text-sky-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Buku Tidak Ditemukan</h3>
                    <p class="text-slate-500 max-w-md mx-auto">
                        Maaf, kami tidak dapat menemukan buku yang cocok dengan kriteria pencarian Anda. Coba gunakan kata kunci
                        atau kategori lain.
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
            <div class="w-20 h-1.5 bg-sky-400 rounded-full mt-4"></div>
        </div>

        <!-- Bento Grid Layout -->
        <div id="informasi" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <!-- Jam Operasional (Solid Blue Card) -->
            <div
                class="bg-sky-500 rounded-[2rem] p-8 text-white shadow-md hover:-translate-y-1 transition-transform duration-300 flex flex-col justify-center">
                <div
                    class="w-12 h-12 rounded-2xl flex items-center justify-center bg-white/20 text-white mb-6 backdrop-blur-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="font-black text-xl mb-4 tracking-tight">Jam Operasional</h3>
                <ul class="text-sm space-y-3 font-medium text-sky-50">
                    <li class="flex items-center justify-between border-b border-sky-400 pb-2">
                        <span>Senin - Jumat</span>
                        <span class="font-bold text-white">08:00 - 16:00</span>
                    </li>
                    <li class="flex items-center justify-between border-b border-sky-400 pb-2">
                        <span>Sabtu</span>
                        <span class="font-bold text-white">09:00 - 14:00</span>
                    </li>
                    <li class="flex items-center justify-between pt-1">
                        <span>Minggu / Libur</span>
                        <span
                            class="px-2 py-1 bg-sky-600 rounded-md text-[10px] font-bold uppercase tracking-wider">Tutup</span>
                    </li>
                </ul>
            </div>

            <!-- Kontak Kami (White Glassy Card) -->
            <div
                class="bg-white rounded-[2rem] p-8 border border-sky-100 shadow-sm hover:-translate-y-1 transition-transform duration-300 flex flex-col justify-center">
                <div class="w-12 h-12 rounded-2xl flex items-center justify-center bg-sky-50 text-sky-600 mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="font-black text-slate-800 text-xl mb-4 tracking-tight">Kontak Kami</h3>
                <div class="space-y-4">
                    <a href="mailto:info@perpustakaan.com"
                        class="flex items-center gap-3 text-sm text-slate-600 font-medium hover:text-sky-600 transition-colors group">
                        <div
                            class="w-8 h-8 rounded-full bg-slate-50 flex items-center justify-center group-hover:bg-sky-50 transition-colors">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        perpustakaan@pnp.id
                    </a>
                    <a href="tel:02112345678"
                        class="flex items-center gap-3 text-sm text-slate-600 font-medium hover:text-sky-600 transition-colors group">
                        <div
                            class="w-8 h-8 rounded-full bg-slate-50 flex items-center justify-center group-hover:bg-sky-50 transition-colors">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        (021) 1234-5678
                    </a>
                </div>
            </div>

            <!-- Map Card (Single Column, Compact) -->
            <div
                class="rounded-[2rem] overflow-hidden h-64 lg:h-full min-h-[300px] border border-sky-100 shadow-sm relative group bg-slate-100 md:col-span-2 lg:col-span-1">
                <div
                    class="absolute inset-0 z-10 pointer-events-none shadow-[inset_0_0_20px_rgba(0,0,0,0.05)] rounded-[2rem]">
                </div>
                <!-- Interactive overlay prompt -->
                <div
                    class="absolute inset-x-0 bottom-0 p-4 bg-white/80 backdrop-blur-md border-t border-white/50 translate-y-full group-hover:translate-y-0 transition-transform duration-300 z-20 flex justify-between items-center">
                    <span class="text-xs font-bold text-sky-900">Lokasi</span>
                    <a href="https://maps.google.com/?q=-0.9144248993635581,100.4661698580422" target="_blank"
                        class="px-3 py-1.5 bg-sky-500 text-white text-[10px] font-bold rounded-lg hover:bg-sky-600 transition-colors">Buka
                        Map</a>
                </div>
                <iframe
                    src="https://maps.google.com/maps?q=-0.9144248993635581,100.4661698580422&t=&z=15&ie=UTF8&iwloc=&output=embed"
                    class="w-full h-full border-0 absolute inset-0 z-0" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>

            <!-- Informasi Penting (Dark Wide Strip) -->
            <div
                class="md:col-span-2 lg:col-span-3 bg-slate-900 rounded-[2rem] p-6 sm:p-8 shadow-lg flex flex-col sm:flex-row items-start sm:items-center justify-between gap-6 group hover:bg-slate-800 transition-colors duration-500">
                <div class="flex items-center gap-5">
                    <div
                        class="w-16 h-16 rounded-2xl bg-slate-800 flex items-center justify-center text-sky-400 group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-black text-white text-lg mb-1 tracking-tight">Aturan & Informasi Penting</h3>
                        <p class="text-sm text-slate-400">Harap diperhatikan sebelum meminjam buku.</p>
                    </div>
                </div>

                <div class="flex flex-wrap gap-3 w-full sm:w-auto mt-4 sm:mt-0 justify-start sm:justify-end">
                    <div class="bg-slate-800/50 px-4 py-3 rounded-xl flex-1 sm:flex-none border border-slate-700/50">
                        <p class="text-[10px] text-slate-400 font-bold uppercase tracking-wider mb-1">Max Peminjaman</p>
                        <p class="text-sm font-medium text-white">3 Buku / Anggota</p>
                    </div>
                    <div class="bg-slate-800/50 px-4 py-3 rounded-xl flex-1 sm:flex-none border border-slate-700/50">
                        <p class="text-[10px] text-slate-400 font-bold uppercase tracking-wider mb-1">Durasi</p>
                        <p class="text-sm font-medium text-white">Maksimal 3 Hari</p>
                    </div>
                    <div class="bg-slate-800/50 px-4 py-3 rounded-xl flex-1 sm:flex-none border border-slate-700/50">
                        <p class="text-[10px] text-slate-400 font-bold uppercase tracking-wider mb-1">Terlambat</p>
                        <p class="text-sm font-bold text-rose-400">Rp 2.000 / Hari</p>
                    </div>
                    <div class="bg-slate-800/50 px-4 py-3 rounded-xl flex-1 sm:flex-none border border-slate-700/50">
                        <p class="text-[10px] text-slate-400 font-bold uppercase tracking-wider mb-1">Rusak</p>
                        <p class="text-sm font-bold text-orange-400">Rp 20.000</p>
                    </div>
                    <div class="bg-slate-800/50 px-4 py-3 rounded-xl flex-1 sm:flex-none border border-slate-700/50">
                        <p class="text-[10px] text-slate-400 font-bold uppercase tracking-wider mb-1">Hilang</p>
                        <p class="text-sm font-bold text-red-500">Rp 50.000</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection