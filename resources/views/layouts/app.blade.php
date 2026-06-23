<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Perpus | Sistem Manajemen Perpustakaan</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 min-h-screen antialiased selection:bg-indigo-100 selection:text-indigo-900">

    <!-- Navbar Minimalis -->
    <nav class="bg-white/90 backdrop-blur-md sticky top-0 z-50 border-b border-slate-200 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 md:h-20 items-center">
                <div class="flex items-center gap-8">
                    <!-- Logo -->
                    <a href="{{ route('books.index') }}" class="flex items-center gap-3 group">
                        <div class="bg-indigo-600 text-white p-2.5 rounded-xl shadow-md group-hover:bg-indigo-700 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                            </svg>
                        </div>
                        <span class="text-2xl font-bold text-slate-900 tracking-tight">E-Perpus</span>
                    </a>
                    
                    <!-- Menu -->
                    <div class="hidden md:flex space-x-1">
                        <a href="{{ route('dashboard') }}" class="px-4 py-2.5 rounded-lg text-sm font-semibold transition-colors {{ request()->routeIs('dashboard') ? 'bg-indigo-50 text-indigo-700' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                            Dashboard
                        </a>
                        <a href="{{ route('books.index') }}" class="px-4 py-2.5 rounded-lg text-sm font-semibold transition-colors {{ request()->routeIs('books.*') ? 'bg-indigo-50 text-indigo-700' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                            Katalog Buku
                        </a>
                        <a href="{{ route('borrowings.index') }}" class="px-4 py-2.5 rounded-lg text-sm font-semibold transition-colors {{ request()->routeIs('borrowings.*') ? 'bg-indigo-50 text-indigo-700' : 'text-slate-600 hover:bg-slate-100 hover:text-slate-900' }}">
                            Data Peminjaman
                        </a>
                    </div>
                </div>
                
                <!-- Profil Pengguna -->
                <div class="flex items-center gap-3 cursor-pointer hover:bg-slate-50 p-2 rounded-lg transition-colors">
                    <div class="text-right hidden md:block">
                        <p class="text-sm font-bold text-slate-900">Admin Utama</p>
                        <p class="text-xs font-medium text-slate-500">Pustakawan</p>
                    </div>
                    <img src="https://ui-avatars.com/api/?name=Admin+Utama&background=4f46e5&color=fff&rounded=true" alt="Admin" class="w-10 h-10 rounded-full border border-slate-200">
                </div>
            </div>
        </div>
    </nav>

    <!-- Konten Utama -->
    <main class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        @yield('content')
    </main>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('scripts')
</body>
</html>
