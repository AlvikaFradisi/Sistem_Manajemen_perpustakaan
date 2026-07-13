<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan PNP — Sistem Manajemen Perpustakaan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        tailwind.config = {
            theme: { 
                extend: { 
                    fontFamily: { sans: ['Inter', 'sans-serif'] },
                    colors: {
                        sky: {
                            50: '#fffbf7',
                            100: '#fff4eb',
                            200: '#ffe8d6',
                            300: '#ffdbbd',
                            400: '#ffcda3',
                            500: '#ffbe91',
                            600: '#e6a67a',
                            700: '#b37f59',
                            800: '#80593b',
                            900: '#4d3320',
                            950: '#332012',
                        }
                    }
                } 
            }
        }
    </script>
    <style>
        /* Scrollbar */
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #4d3320; border-radius: 9999px; }
        ::-webkit-scrollbar-thumb:hover { background: #ffbe91; }

        /* Sidebar background */
        .sidebar-bg {
            background: #ffffff;
        }

        /* Active nav item */
        .nav-active {
            background: rgba(255, 190, 145, 0.15);
            border-left: 3px solid #ffbe91 !important;
        }
        .nav-active .nav-icon { color: #ffbe91 !important; }
        .nav-active .nav-label { color: #b37f59 !important; font-weight: 700; }

        /* Nav hover */
        .nav-item {
            border-left: 3px solid transparent;
            transition: all 0.18s ease;
        }
        .nav-item:hover {
            background: rgba(255, 190, 145, 0.05);
            border-left: 3px solid rgba(255, 190, 145, 0.3);
        }
        .nav-item:hover .nav-icon { color: #ffbe91 !important; }
        .nav-item:hover .nav-label { color: #b37f59 !important; }

        /* Logo gradient */
        .logo-text {
            color: #4d3320;
        }
        .logo-icon { background: transparent; }

        /* Section label */
        .sidebar-section-label { color: rgba(77, 51, 32, 0.5); }

        /* Sidebar inactive nav text */
        .nav-icon { color: rgba(77, 51, 32, 0.4); }
        .nav-label { color: rgba(77, 51, 32, 0.7); font-size: 0.875rem; }

        /* Sidebar status mini card */
        .sidebar-status-card {
            background: #fffbf7;
            border: 1px solid rgba(255,190,145,0.3);
        }
        .status-label { color: rgba(77, 51, 32, 0.8); }

        /* Sidebar profile card */
        .sidebar-profile {
            background: #fffbf7;
            border: 1px solid rgba(255,190,145,0.2);
            transition: background 0.2s;
        }
        .sidebar-profile:hover { background: #ffe8d6; }

        /* Topbar dark */
        .topbar-dark {
            background: #ffffff;
            border-bottom: 1px solid rgba(0,0,0,0.05);
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.02);
        }

        /* Content background (teal tinted grid) */
        .content-bg {
            background-color: #fffbf7;
            background-image: radial-gradient(circle, #ffe8d6 1px, transparent 1px);
            background-size: 24px 24px;
        }

        /* Badge pulse animation */
        @keyframes pulse-badge { 0%,100%{opacity:1} 50%{opacity:0.5} }
        .badge-pulse { animation: pulse-badge 2s cubic-bezier(0.4,0,0.6,1) infinite; }

        /* Page fade in */
        main { animation: fadeIn 0.3s ease; }
        @keyframes fadeIn { from{opacity:0;transform:translateY(6px)} to{opacity:1;transform:translateY(0)} }

        /* Date chip in topbar */
        .topbar-chip {
            background: rgba(255,255,255,0.5);
            border: 1px solid rgba(127,50,15,0.1);
            color: rgba(77, 51, 32, 0.9);
        }

        /* Topbar divider */
        .topbar-divider { background: rgba(127,50,15,0.15); }
    </style>
</head>
<body class="font-sans antialiased overflow-hidden" x-data="{ sidebarOpen: false }">

<div class="flex h-screen w-full">

    <!-- Mobile overlay -->
    <div x-show="sidebarOpen"
         class="fixed inset-0 z-20 bg-black/60 backdrop-blur-sm lg:hidden"
         @click="sidebarOpen = false"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0">
    </div>

    <!-- ===== SIDEBAR ===== -->
    <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
           class="sidebar-bg fixed inset-y-0 left-0 z-30 w-64 transition duration-300 transform lg:translate-x-0 lg:static lg:inset-0 flex flex-col border-r border-white/5 shadow-2xl">

        <!-- Logo -->
        <div class="flex items-center gap-3 px-5 h-24 border-b border-white/5 flex-shrink-0">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3 group">
                <div class="logo-icon w-20 h-20 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-105 transition-transform bg-transparent">
                    <img src="{{ asset('images/logopnp.png') }}" alt="Logo" class="w-full h-full object-contain mix-blend-multiply scale-[1.35]">
                </div>
                <div>
                    <span class="logo-text text-lg font-bold tracking-tight">Perpustakaan PNP</span>
                    <p class="text-[10px] -mt-0.5 font-medium" style="color: rgba(77, 51, 32, 0.7);">Library Management</p>
                </div>
            </a>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 px-3 py-6 space-y-0.5 overflow-y-auto">
            <p class="sidebar-section-label text-[10px] px-3 uppercase font-bold tracking-widest mb-3">Menu Utama</p>

            <a href="{{ route('dashboard') }}"
               class="nav-item flex items-center gap-3 px-3 py-2.5 rounded-lg {{ request()->routeIs('dashboard') ? 'nav-active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0 nav-icon {{ request()->routeIs('dashboard') ? '!text-sky-300' : '' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 5a1 1 0 011-1h4a1 1 0 011 1v5a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM14 5a1 1 0 011-1h4a1 1 0 011 1v2a1 1 0 01-1 1h-4a1 1 0 01-1-1V5zM4 15a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1H5a1 1 0 01-1-1v-4zM14 12a1 1 0 011-1h4a1 1 0 011 1v7a1 1 0 01-1 1h-4a1 1 0 01-1-1v-7z" />
                </svg>
                <span class="nav-label {{ request()->routeIs('dashboard') ? 'nav-active-label' : '' }}">Dashboard</span>
            </a>

            <a href="{{ route('books.index') }}"
               class="nav-item flex items-center gap-3 px-3 py-2.5 rounded-lg {{ request()->routeIs('books.*') ? 'nav-active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0 nav-icon {{ request()->routeIs('books.*') ? '!text-sky-300' : '' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
                <span class="nav-label {{ request()->routeIs('books.*') ? 'nav-active-label' : '' }}">Katalog Buku</span>
            </a>

            <a href="{{ route('members.index') }}"
               class="nav-item flex items-center gap-3 px-3 py-2.5 rounded-lg {{ request()->routeIs('members.*') ? 'nav-active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0 nav-icon {{ request()->routeIs('members.*') ? '!text-sky-300' : '' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <span class="nav-label {{ request()->routeIs('members.*') ? 'nav-active-label' : '' }}">Data Anggota</span>
            </a>

            <a href="{{ route('borrowings.index') }}"
               class="nav-item flex items-center gap-3 px-3 py-2.5 rounded-lg {{ request()->routeIs('borrowings.*') ? 'nav-active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0 nav-icon {{ request()->routeIs('borrowings.*') ? '!text-sky-300' : '' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                </svg>
                <span class="nav-label {{ request()->routeIs('borrowings.*') ? 'nav-active-label' : '' }}">Sirkulasi</span>
                @php $overdueCount = \App\Models\Borrowing::where('status','Terlambat')->count(); @endphp
                @if($overdueCount > 0)
                <span class="ml-auto text-[10px] font-bold bg-sky-500 text-white px-1.5 py-0.5 rounded-full badge-pulse">{{ $overdueCount }}</span>
                @endif
            </a>

            <div class="my-4 border-t border-white/5"></div>
            <p class="sidebar-section-label text-[10px] px-3 uppercase font-bold tracking-widest mb-3">Laporan</p>

            <a href="{{ route('reports.borrowings') }}"
               class="nav-item flex items-center gap-3 px-3 py-2.5 rounded-lg {{ request()->routeIs('reports.borrowings') ? 'nav-active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0 nav-icon {{ request()->routeIs('reports.borrowings') ? '!text-sky-300' : '' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <span class="nav-label {{ request()->routeIs('reports.borrowings') ? 'nav-active-label' : '' }}">Peminjaman</span>
            </a>

            <a href="{{ route('reports.books') }}"
               class="nav-item flex items-center gap-3 px-3 py-2.5 rounded-lg {{ request()->routeIs('reports.books') ? 'nav-active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0 nav-icon {{ request()->routeIs('reports.books') ? '!text-sky-300' : '' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
                <span class="nav-label {{ request()->routeIs('reports.books') ? 'nav-active-label' : '' }}">Buku Masuk</span>
            </a>

            <a href="{{ route('reports.fines') }}"
               class="nav-item flex items-center gap-3 px-3 py-2.5 rounded-lg {{ request()->routeIs('reports.fines') ? 'nav-active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0 nav-icon {{ request()->routeIs('reports.fines') ? '!text-sky-300' : '' }}" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="nav-label {{ request()->routeIs('reports.fines') ? 'nav-active-label' : '' }}">Keuangan Denda</span>
            </a>

            <div class="my-4 border-t border-white/5"></div>
            <p class="sidebar-section-label text-[10px] px-3 uppercase font-bold tracking-widest mb-3">Sistem</p>

            <div class="mx-2 p-3 rounded-xl sidebar-status-card">
                <p class="text-[10px] font-bold uppercase tracking-wider mb-2" style="color: #7f320f;">Status Sistem</p>
                <div class="flex items-center gap-2 mb-1.5">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 flex-shrink-0"></span>
                    <span class="text-xs" style="color: rgba(77, 51, 32, 0.9);">Database Terhubung</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 badge-pulse flex-shrink-0"></span>
                    <span class="text-xs" style="color: rgba(77, 51, 32, 0.9);">Server Aktif</span>
                </div>
            </div>
        </nav>

        <!-- Profile Footer -->
        <div class="p-4 border-t border-white/5 flex-shrink-0">
            <div class="sidebar-profile flex items-center gap-3 p-3 rounded-xl cursor-pointer">
                <div class="h-9 w-9 rounded-xl flex-shrink-0 flex items-center justify-center font-bold text-xs text-slate-800 shadow-md"
                     style="background: #ffbe91;">
                    {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}{{ strtoupper(substr(Auth::user()->name ?? 'U', 1, 1)) }}
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-bold truncate" style="color: #4d3320;">{{ Auth::user()->name ?? 'Admin Utama' }}</p>
                    <p class="text-[11px] font-medium truncate" style="color: rgba(77, 51, 32, 0.8);">Pustakawan</p>
                </div>
                <form method="POST" action="{{ route('logout') }}" class="flex-shrink-0">
                    @csrf
                    <button type="submit" class="p-1 hover:bg-black/5 rounded-lg transition-colors group/logout" title="Logout">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" style="color: rgba(77, 51, 32, 0.6)" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- ===== MAIN AREA ===== -->
    <div class="flex-1 flex flex-col w-0 overflow-hidden">

        <!-- Topbar -->
        <header class="topbar-dark h-16 flex items-center justify-between px-4 sm:px-6 lg:px-8 z-10 flex-shrink-0">

            <!-- Mobile hamburger -->
            <button @click="sidebarOpen = true" class="p-2 rounded-lg transition-colors" style="color: rgba(77, 51, 32, 0.8);">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            <!-- Breadcrumb -->
            <div class="hidden lg:flex items-center gap-2 text-sm">
                <span class="font-bold" style="color: rgba(77, 51, 32, 0.9);">Perpustakaan PNP</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" style="color: rgba(127, 50, 15, 0.6)" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
                <span class="font-bold text-sky-500">
                    @php
                        $segment = request()->segment(1);
                        $labels = ['books' => 'Katalog Buku', 'borrowings' => 'Sirkulasi Peminjaman'];
                        echo $segment ? ($labels[$segment] ?? ucfirst($segment)) : 'Dashboard';
                    @endphp
                </span>
            </div>

            <!-- Right actions -->
            <div class="flex items-center gap-2">
                <!-- Date chip -->
                <div class="hidden md:flex items-center gap-2 px-3 py-1.5 rounded-lg text-xs font-medium topbar-chip">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" style="color:#c74a06" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    {{ \Carbon\Carbon::now()->translatedFormat('d M Y') }}
                </div>

                <!-- Notif -->
                <button class="relative p-2 rounded-lg transition-colors" style="color: rgba(77, 51, 32, 0.8);">
                    @if(isset($overdueCount) && $overdueCount > 0)
                    <span class="absolute top-1.5 right-1.5 h-2 w-2 rounded-full bg-sky-500 badge-pulse"></span>
                    @endif
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                </button>

                <div class="h-5 w-px topbar-divider"></div>

                <!-- Avatar / Dropdown -->
                <div class="relative pl-1" x-data="{ dropdownOpen: false }">
                    <div @click="dropdownOpen = !dropdownOpen" @click.away="dropdownOpen = false" class="flex items-center gap-2.5 cursor-pointer group">
                        <div class="h-8 w-8 rounded-lg flex items-center justify-center font-bold text-xs text-white shadow-md group-hover:scale-105 transition-transform"
                             style="background: #e6a67a;">
                            {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}{{ strtoupper(substr(Auth::user()->name ?? 'U', 1, 1)) }}
                        </div>
                        <div class="hidden sm:block">
                            <p class="text-xs font-bold leading-tight" style="color: #4d3320;">{{ Auth::user()->name ?? 'Admin Utama' }}</p>
                            <p class="text-[10px] font-medium" style="color: rgba(77, 51, 32, 0.8);">Pustakawan</p>
                        </div>
                    </div>
                    
                    <!-- Dropdown -->
                    <div x-show="dropdownOpen" 
                         x-transition:enter="transition ease-out duration-100"
                         x-transition:enter-start="transform opacity-0 scale-95"
                         x-transition:enter-end="transform opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="transform opacity-100 scale-100"
                         x-transition:leave-end="transform opacity-0 scale-95"
                         class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg border border-slate-100 py-1 z-50">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </header>

        <!-- Content -->
        <main class="flex-1 overflow-y-auto content-bg p-4 sm:p-6 lg:p-8">
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            @if(session('success'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        title: 'Berhasil!',
                        text: '{{ session('success') }}',
                        icon: 'success',
                        confirmButtonColor: '#ffbe91',
                        customClass: {
                            popup: 'rounded-2xl shadow-2xl border border-orange-100',
                            title: 'text-lg font-bold text-slate-800',
                            confirmButton: 'px-6 py-2.5 text-sm font-semibold rounded-xl text-slate-900'
                        },
                        buttonsStyling: false,
                    });
                });
            </script>
            @endif

            @yield('content')
        </main>
    </div>
</div>

@stack('scripts')
</body>
</html>
