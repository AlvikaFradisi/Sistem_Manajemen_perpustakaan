<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Perpus — Sistem Manajemen Perpustakaan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        tailwind.config = {
            theme: { extend: { fontFamily: { sans: ['Inter', 'sans-serif'] } } }
        }
    </script>
    <style>
        /* Scrollbar */
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #0c4a6e; border-radius: 9999px; }
        ::-webkit-scrollbar-thumb:hover { background: #0ea5e9; }

        /* Sidebar background */
        .sidebar-bg {
            background: #0c4a6e;
        }

        /* Active nav item */
        .nav-active {
            background: rgba(14,165,233,0.15);
            border-left: 3px solid #0ea5e9 !important;
        }
        .nav-active .nav-icon { color: #7dd3fc !important; }
        .nav-active .nav-label { color: #bae6fd !important; font-weight: 700; }

        /* Nav hover */
        .nav-item {
            border-left: 3px solid transparent;
            transition: all 0.18s ease;
        }
        .nav-item:hover {
            background: rgba(147,197,253,0.07);
            border-left: 3px solid rgba(14,165,233,0.35);
        }
        .nav-item:hover .nav-icon { color: #7dd3fc !important; }
        .nav-item:hover .nav-label { color: #bae6fd !important; }

        /* Logo gradient */
        .logo-text {
            background: #0ea5e9;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .logo-icon { background: #0ea5e9; }

        /* Section label */
        .sidebar-section-label { color: rgba(186,230,253,0.5); }

        /* Sidebar inactive nav text */
        .nav-icon { color: rgba(186,230,253,0.6); }
        .nav-label { color: rgba(186,230,253,0.85); font-size: 0.875rem; }

        /* Sidebar status mini card */
        .sidebar-status-card {
            background: rgba(14,165,233,0.07);
            border: 1px solid rgba(14,165,233,0.15);
        }
        .status-label { color: rgba(186,230,253,0.7); }

        /* Sidebar profile card */
        .sidebar-profile {
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.06);
            transition: background 0.2s;
        }
        .sidebar-profile:hover { background: rgba(255,255,255,0.08); }

        /* Topbar dark */
        .topbar-dark {
            background: #0c4a6e;
            border-bottom: 1px solid rgba(14,165,233,0.18);
            box-shadow: 0 1px 0 rgba(14,165,233,0.07), 0 4px 24px rgba(0,0,0,0.35);
        }

        /* Content background (teal tinted grid) */
        .content-bg {
            background-color: #f0f9ff;
            background-image: radial-gradient(circle, #bae6fd 1px, transparent 1px);
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
            background: rgba(14,165,233,0.08);
            border: 1px solid rgba(14,165,233,0.15);
            color: rgba(186,230,253,0.9);
        }

        /* Topbar divider */
        .topbar-divider { background: rgba(14,165,233,0.15); }
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
        <div class="flex items-center gap-3 px-5 h-20 border-b border-white/5 flex-shrink-0">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3 group">
                <div class="logo-icon w-9 h-9 rounded-xl flex items-center justify-center shadow-lg flex-shrink-0 group-hover:scale-105 transition-transform">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <div>
                    <span class="logo-text text-lg font-bold tracking-tight">E-Perpus</span>
                    <p class="text-[10px] -mt-0.5 font-medium" style="color: rgba(186,230,253,0.6);">Library Management</p>
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
            <p class="sidebar-section-label text-[10px] px-3 uppercase font-bold tracking-widest mb-3">Sistem</p>

            <div class="mx-2 p-3 rounded-xl sidebar-status-card">
                <p class="text-[10px] font-bold uppercase tracking-wider mb-2" style="color: #7dd3fc;">Status Sistem</p>
                <div class="flex items-center gap-2 mb-1.5">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 flex-shrink-0"></span>
                    <span class="text-xs" style="color: rgba(186,230,253,0.75);">Database Terhubung</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 badge-pulse flex-shrink-0"></span>
                    <span class="text-xs" style="color: rgba(186,230,253,0.75);">Server Aktif</span>
                </div>
            </div>
        </nav>

        <!-- Profile Footer -->
        <div class="p-4 border-t border-white/5 flex-shrink-0">
            <div class="sidebar-profile flex items-center gap-3 p-3 rounded-xl cursor-pointer">
                <div class="h-9 w-9 rounded-xl flex-shrink-0 flex items-center justify-center font-bold text-xs text-white shadow-md"
                     style="background: #0ea5e9;">
                    AU
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-semibold truncate" style="color: #bae6fd;">Admin Utama</p>
                    <p class="text-[11px] truncate" style="color: rgba(186,230,253,0.75);">Pustakawan</p>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 flex-shrink-0" style="color: rgba(186,230,253,0.5)" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                </svg>
            </div>
        </div>
    </aside>

    <!-- ===== MAIN AREA ===== -->
    <div class="flex-1 flex flex-col w-0 overflow-hidden">

        <!-- Topbar -->
        <header class="topbar-dark h-16 flex items-center justify-between px-4 sm:px-6 lg:px-8 z-10 flex-shrink-0">

            <!-- Mobile hamburger -->
            <button @click="sidebarOpen = true" class="p-2 rounded-lg transition-colors" style="color: rgba(186,230,253,0.7);">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            <!-- Breadcrumb -->
            <div class="hidden lg:flex items-center gap-2 text-sm">
                <span class="font-medium" style="color: rgba(186,230,253,0.75);">E-Perpus</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" style="color: rgba(14,165,233,0.6)" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
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
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" style="color:#0ea5e9" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    {{ \Carbon\Carbon::now()->translatedFormat('d M Y') }}
                </div>

                <!-- Notif -->
                <button class="relative p-2 rounded-lg transition-colors" style="color: rgba(186,230,253,0.7);">
                    @if(isset($overdueCount) && $overdueCount > 0)
                    <span class="absolute top-1.5 right-1.5 h-2 w-2 rounded-full bg-sky-500 badge-pulse"></span>
                    @endif
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                </button>

                <div class="h-5 w-px topbar-divider"></div>

                <!-- Avatar -->
                <div class="flex items-center gap-2.5 pl-1 cursor-pointer group">
                    <div class="h-8 w-8 rounded-lg flex items-center justify-center font-bold text-xs text-white shadow-md group-hover:scale-105 transition-transform"
                         style="background: #0ea5e9;">
                        AU
                    </div>
                    <div class="hidden sm:block">
                        <p class="text-xs font-semibold leading-tight" style="color: #bae6fd;">Admin Utama</p>
                        <p class="text-[10px]" style="color: rgba(186,230,253,0.75);">Pustakawan</p>
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
                        confirmButtonColor: '#0ea5e9',
                        customClass: {
                            popup: 'rounded-2xl shadow-2xl border border-sky-100',
                            title: 'text-lg font-bold text-slate-800',
                            confirmButton: 'px-6 py-2.5 text-sm font-semibold rounded-xl'
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
