<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Manajemen Perpustakaan</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
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
</head>
<body class="bg-slate-50 min-h-screen flex items-center justify-center p-4">

    <div class="max-w-md w-full bg-white rounded-3xl shadow-xl border border-slate-100 overflow-hidden relative">
        <!-- Decoration -->
        <div class="absolute top-0 right-0 w-32 h-32 bg-sky-100 rounded-full blur-3xl -mr-16 -mt-16 z-0"></div>
        <div class="absolute bottom-0 left-0 w-32 h-32 bg-sky-100 rounded-full blur-3xl -ml-16 -mb-16 z-0"></div>
        
        <div class="p-8 sm:p-10 relative z-10">
            <div class="text-center mb-10">
                <div class="inline-flex items-center justify-center w-40 h-40 mb-6 bg-transparent">
                    <img src="{{ asset('images/logopnp.png') }}" alt="Logo" class="w-full h-full object-contain mix-blend-multiply scale-[1.35]">
                </div>
                <h1 class="text-2xl font-bold text-slate-900 tracking-tight">Login Admin</h1>
                <p class="text-slate-500 mt-2 text-sm">Sistem Manajemen Perpustakaan</p>
            </div>

            @if ($errors->any())
            <div class="mb-6 bg-red-50 text-red-600 p-4 rounded-xl text-sm border border-red-100 flex gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                </svg>
                <p>{{ $errors->first() }}</p>
            </div>
            @endif

            <form action="{{ route('login') }}" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-semibold text-slate-700 mb-2">Email Address</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:ring-2 focus:ring-sky-500 focus:border-sky-500 transition-all outline-none" 
                        placeholder="admin@admin.com">
                </div>
                
                <div>
                    <label for="password" class="block text-sm font-semibold text-slate-700 mb-2">Password</label>
                    <input type="password" name="password" id="password" required
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:bg-white focus:ring-2 focus:ring-sky-500 focus:border-sky-500 transition-all outline-none" 
                        placeholder="••••••••">
                </div>

                <button type="submit" class="w-full py-3.5 bg-sky-600 text-white rounded-xl font-bold text-sm shadow-md shadow-sky-600/20 hover:bg-sky-700 hover:shadow-lg hover:shadow-sky-700/30 transition-all focus:ring-2 focus:ring-offset-2 focus:ring-sky-500 mt-2">
                    Masuk ke Dashboard
                </button>
            </form>
            
            <div class="mt-8 text-center text-sm text-slate-500">
                <a href="{{ route('landing.index') }}" class="font-semibold text-sky-600 hover:text-sky-800 transition-colors">
                    &larr; Kembali ke Katalog Publik
                </a>
            </div>
        </div>
    </div>
</body>
</html>
