@extends('layouts.app')

@section('content')
    {{-- Hero Section --}}
    <div class="relative overflow-hidden rounded-2xl p-8 sm:p-10 mb-8 text-white"
        style="background: #ffbe91; box-shadow: 0 20px 60px -10px rgba(127,50,15,0.3);">
        {{-- Glow decorations --}}
        <div class="absolute -top-16 -right-16 w-72 h-72 rounded-full blur-3xl" style="background: transparent"></div>
        <div class="absolute -bottom-16 -left-8 w-64 h-64 rounded-full blur-3xl" style="background: transparent"></div>
        <div class="absolute top-1/2 right-1/3 w-48 h-48 rounded-full blur-3xl" style="background: transparent"></div>

        <div class="relative z-10 flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
            <div>
                <span
                    class="inline-flex items-center gap-1.5 px-3 py-1 mb-4 text-[11px] font-bold tracking-widest uppercase rounded-full border"
                    style="background: rgba(77, 51, 32, 0.2); border-color: rgba(77, 51, 32, 0.35); color: #4d3320;">
                    <span class="w-1.5 h-1.5 rounded-full bg-sky-400 badge-pulse"></span>
                    Live Dashboard
                </span>
                <h1 class="text-3xl sm:text-4xl font-black tracking-tight mb-2 text-slate-900">Selamat Datang, Pustakawan !
                </h1>
                <p class="text-slate-800 text-base font-light max-w-xl" Pantau seluruh aktivitas perpustakaan secara
                    real-time dari satu tempat. </p>
            </div>
            <div class="hidden lg:block flex-shrink-0">
                <div class="flex items-center gap-3 px-4 py-3 rounded-2xl border"
                    style="background: rgba(255,255,255,0.4); border-color: rgba(255,255,255,0.5);">
                    <div class="p-2.5 rounded-xl" style="background: rgba(255,255,255,0.6);">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-slate-900" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-slate-800 font-medium">Waktu Sistem</p>
                        <p class="text-lg font-bold text-slate-900">{{ \Carbon\Carbon::now()->translatedFormat('d M Y') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Stat Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
        {{-- Card: Total Buku --}}
        <div
            class="bg-white rounded-2xl p-5 border border-sky-100 hover:border-sky-300 hover:shadow-lg hover:shadow-sky-100 transition-all duration-300 group hover:-translate-y-0.5 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-1 h-full rounded-l-2xl" style="background: #ffbe91"></div>
            <div class="pl-3">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-2.5 rounded-xl bg-sky-50 group-hover:bg-sky-100 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-sky-600" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <span class="text-[11px] font-bold text-sky-500 bg-sky-50 px-2 py-0.5 rounded-full">Koleksi</span>
                </div>
                <h3 class="text-3xl font-black text-slate-900 mb-0.5">{{ number_format($totalBooks) }}</h3>
                <p class="text-sm text-slate-500">Total Judul <span class="text-slate-400">({{ $totalStock }} stok)</span>
                </p>
            </div>
        </div>

        {{-- Card: Dipinjam --}}
        <div
            class="bg-white rounded-2xl p-5 border border-sky-100 hover:border-sky-300 hover:shadow-lg hover:shadow-sky-50 transition-all duration-300 group hover:-translate-y-0.5 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-1 h-full rounded-l-2xl" style="background: #e6a67a"></div>
            <div class="pl-3">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-2.5 rounded-xl bg-sky-50 group-hover:bg-sky-100 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-sky-600" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <span
                        class="flex items-center gap-1 text-[11px] font-bold text-sky-600 bg-sky-50 px-2 py-0.5 rounded-full">
                        <span class="w-1.5 h-1.5 rounded-full bg-sky-500 badge-pulse"></span>Aktif
                    </span>
                </div>
                <h3 class="text-3xl font-black text-slate-900 mb-0.5">{{ number_format($borrowedBooks) }}</h3>
                <p class="text-sm text-slate-500">Sedang Dipinjam</p>
            </div>
        </div>

        {{-- Card: Terlambat --}}
        <div
            class="bg-white rounded-2xl p-5 border border-sky-100 hover:border-sky-300 hover:shadow-lg hover:shadow-sky-50 transition-all duration-300 group hover:-translate-y-0.5 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-1 h-full rounded-l-2xl" style="background: #b37f59"></div>
            <div class="pl-3">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-2.5 rounded-xl bg-sky-50 group-hover:bg-sky-100 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-sky-600" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                        </svg>
                    </div>
                    @if($overdueBooks > 0)
                        <span class="text-[11px] font-bold text-sky-600 bg-sky-50 px-2 py-0.5 rounded-full">Perhatian!</span>
                    @endif
                </div>
                <h3 class="text-3xl font-black text-sky-600 mb-0.5">{{ number_format($overdueBooks) }}</h3>
                <p class="text-sm text-slate-500">Terlambat Kembali</p>
            </div>
        </div>

        {{-- Card: Denda --}}
        <div
            class="bg-white rounded-2xl p-5 border border-sky-100 hover:border-sky-300 hover:shadow-lg hover:shadow-sky-50 transition-all duration-300 group hover:-translate-y-0.5 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-1 h-full rounded-l-2xl" style="background: #ffbe91"></div>
            <div class="pl-3">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-2.5 rounded-xl bg-sky-50 group-hover:bg-sky-100 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-sky-600" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <span class="text-[11px] font-bold text-sky-600 bg-sky-50 px-2 py-0.5 rounded-full">Denda</span>
                </div>
                <h3 class="text-2xl font-black text-slate-900 mb-0.5 tracking-tight">
                    Rp{{ number_format($totalFines, 0, ',', '.') }}</h3>
                <p class="text-sm text-slate-500">Total Denda</p>
            </div>
        </div>
    </div>

    {{-- Charts --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 mb-8">
        {{-- Area Chart --}}
        <div class="lg:col-span-2 bg-white rounded-2xl border border-sky-100 p-6 shadow-sm">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h3 class="text-base font-bold text-slate-900">Tren Peminjaman</h3>
                    <p class="text-xs text-slate-400 mt-0.5">Statistik 6 bulan terakhir</p>
                </div>
                <div
                    class="flex items-center gap-2 px-3 py-1.5 rounded-lg text-xs font-semibold text-sky-700 bg-sky-50 border border-sky-100">
                    <span class="w-2 h-2 rounded-full bg-sky-400"></span>
                    Peminjaman
                </div>
            </div>
            <div class="relative w-full min-h-[280px]">
                <canvas id="trendChart"></canvas>
            </div>
        </div>

        {{-- Doughnut --}}
        <div class="bg-white rounded-2xl border border-sky-100 p-6 shadow-sm flex flex-col">
            <div class="mb-4">
                <h3 class="text-base font-bold text-slate-900">Top 5 Kategori</h3>
                <p class="text-xs text-slate-400 mt-0.5">Distribusi koleksi buku</p>
            </div>
            <div class="flex-1 flex justify-center items-center min-h-[230px]">
                @if(count($chartCategories) > 0)
                    <canvas id="categoryChart"></canvas>
                @else
                    <div class="text-center text-sky-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto mb-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="1">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                        </svg>
                        <p class="text-sm text-slate-400">Belum ada data</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Recent Transactions --}}
    <div class="bg-white rounded-2xl border border-sky-100 shadow-sm overflow-hidden">
        <div
            class="px-6 py-4 border-b border-sky-50 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-lg flex items-center justify-center" style="background: #ffbe91">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-800" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold text-slate-900">Aktivitas Terkini</h3>
                    <p class="text-xs text-slate-400">5 transaksi terbaru</p>
                </div>
            </div>
            <a href="{{ route('borrowings.index') }}"
                class="inline-flex items-center gap-1.5 px-4 py-2 text-sm font-semibold rounded-xl transition-all hover:-translate-y-0.5 text-sky-700"
                style="background: linear-gradient(135deg, #fff1f2, #fff7ed);">
                Lihat Semua
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr
                        class="bg-sky-50/40 text-[11px] text-slate-400 uppercase tracking-widest font-semibold border-b border-sky-50">
                        <th class="px-6 py-3.5">Peminjam</th>
                        <th class="px-6 py-3.5">Buku</th>
                        <th class="px-6 py-3.5">Jatuh Tempo</th>
                        <th class="px-6 py-3.5 text-center">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-sky-50 text-sm">
                    @forelse($recentBorrowings as $borrowing)
                        <tr class="hover:bg-sky-50/30 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-lg flex items-center justify-center font-bold text-xs text-slate-800 flex-shrink-0"
                                        style="background: #ffbe91;">
                                        {{ strtoupper(substr($borrowing->member->name ?? 'NA', 0, 2)) }}
                                    </div>
                                    <div>
                                        <div class="font-semibold text-slate-800">
                                            {{ $borrowing->member->name ?? 'Anggota Dihapus' }}</div>
                                        <div class="text-[11px] text-slate-400">{{ $borrowing->member->nim ?? '-' }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-medium text-slate-700 max-w-[220px] line-clamp-1">
                                    {{ $borrowing->book->title ?? 'Buku Dihapus' }}</div>
                            </td>
                            <td class="px-6 py-4 text-slate-500 text-sm">
                                {{ \Carbon\Carbon::parse($borrowing->due_date)->format('d M Y') }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                @if($borrowing->status === 'Dikembalikan')
                                    <span
                                        class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg text-[11px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-100">
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Dikembalikan
                                    </span>
                                @elseif($borrowing->status === 'Dipinjam')
                                    <span
                                        class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg text-[11px] font-bold bg-cyan-50 text-cyan-700 border border-cyan-100">
                                        <span class="w-1.5 h-1.5 rounded-full bg-cyan-500 badge-pulse"></span>
                                        Dipinjam
                                    </span>
                                @elseif($borrowing->status === 'Terlambat')
                                    <span
                                        class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg text-[11px] font-bold bg-sky-50 text-sky-700 border border-sky-100">
                                        <span class="w-1.5 h-1.5 rounded-full bg-sky-400"></span>
                                        Terlambat
                                    </span>
                                @elseif($borrowing->status === 'Rusak')
                                    <span
                                        class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg text-[11px] font-bold bg-orange-50 text-orange-700 border border-orange-100">
                                        <span class="w-1.5 h-1.5 rounded-full bg-orange-400"></span>
                                        Rusak
                                    </span>
                                @elseif($borrowing->status === 'Hilang')
                                    <span
                                        class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg text-[11px] font-bold bg-red-50 text-red-700 border border-red-100">
                                        <span class="w-1.5 h-1.5 rounded-full bg-red-400"></span>
                                        Hilang
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-14 text-center">
                                <div class="inline-flex flex-col items-center">
                                    <div
                                        class="w-14 h-14 rounded-2xl mb-3 flex items-center justify-center bg-sky-50 border border-sky-100">
                                        <svg class="h-7 w-7 text-sky-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                            stroke-width="1.5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                        </svg>
                                    </div>
                                    <p class="text-sm font-medium text-slate-500">Belum ada transaksi.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Chart.defaults.font.family = "'Inter', sans-serif";
            Chart.defaults.color = '#94a3b8';

            // === Tren Peminjaman (Teal Gold) ===
            const trendCtx = document.getElementById('trendChart');
            if (trendCtx) {
                const ctx2d = trendCtx.getContext('2d');
                const gradient = ctx2d.createLinearGradient(0, 0, 0, 320);
                gradient.addColorStop(0, 'rgba(255,190,145,0.28)');
                gradient.addColorStop(0.6, 'rgba(255,190,145,0.08)');
                gradient.addColorStop(1, 'rgba(255,190,145,0.0)');

                new Chart(trendCtx, {
                    type: 'line',
                    data: {
                        labels: {!! json_encode($chartMonths) !!},
                        datasets: [{
                            label: 'Peminjaman',
                            data: {!! json_encode($chartBorrowingTotals) !!},
                            borderColor: '#ffbe91',
                            backgroundColor: 'rgba(255,190,145,0.1)',
                            borderWidth: 2.5,
                            pointBackgroundColor: '#fffbf7',
                            pointBorderColor: '#ffbe91',
                            pointBorderWidth: 2.5,
                            pointRadius: 5,
                            pointHoverRadius: 7,
                            fill: true,
                            tension: 0.42
                        }]
                    },
                    options: {
                        responsive: true, maintainAspectRatio: false,
                        plugins: {
                            legend: { display: false },
                            tooltip: {
                                backgroundColor: '#1a0e0e',
                                padding: 12, cornerRadius: 10,
                                titleFont: { size: 12 },
                                bodyFont: { size: 14, weight: 'bold' },
                                displayColors: false,
                            }
                        },
                        scales: {
                            y: { beginAtZero: true, ticks: { precision: 0, stepSize: 1 }, grid: { color: '#fef2f2', drawBorder: false } },
                            x: { grid: { display: false, drawBorder: false } }
                        },
                        interaction: { intersect: false, mode: 'index' }
                    }
                });
            }

            // === Kategori Buku (Teal Gold) ===
            const catCtx = document.getElementById('categoryChart');
            if (catCtx) {
                new Chart(catCtx, {
                    type: 'doughnut',
                    data: {
                        labels: {!! json_encode($chartCategories) !!},
                        datasets: [{
                            data: {!! json_encode($chartCategoryTotals) !!},
                            backgroundColor: ['#ffbe91', '#e6a67a', '#ffcda3', '#b37f59', '#ffdbbd'],
                            borderWidth: 4,
                            borderColor: '#ffffff',
                            hoverOffset: 8
                        }]
                    },
                    options: {
                        responsive: true, maintainAspectRatio: false,
                        cutout: '72%',
                        plugins: {
                            legend: { position: 'bottom', labels: { usePointStyle: true, padding: 16, font: { size: 11 } } },
                            tooltip: {
                                backgroundColor: '#1a0e0e',
                                padding: 10, cornerRadius: 8,
                                callbacks: { label: (ctx) => ` ${ctx.label}: ${ctx.raw} Judul` }
                            }
                        }
                    }
                });
            }
        });
    </script>
@endpush