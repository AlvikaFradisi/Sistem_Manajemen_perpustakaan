@extends('layouts.app')

@section('content')
<div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
    
    <div class="sm:flex sm:justify-between sm:items-center mb-8">
        <div class="mb-4 sm:mb-0">
            <h1 class="text-2xl md:text-3xl text-slate-800 font-bold">Laporan Keuangan Denda 💰</h1>
        </div>
        <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">
            <a href="{{ route('reports.fines', ['print' => true] + request()->all()) }}" target="_blank" class="btn bg-emerald-500 hover:bg-emerald-600 text-white rounded-lg px-4 py-2 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                </svg>
                Cetak Laporan
            </a>
        </div>
    </div>

    <!-- Filter -->
    <div class="bg-white p-5 shadow-sm rounded-xl border border-slate-200 mb-8">
        <form action="{{ route('reports.fines') }}" method="GET" class="flex flex-col sm:flex-row gap-4 items-end">
            <div>
                <label class="block text-sm font-medium mb-1">Tanggal Mulai (Dikembalikan)</label>
                <input type="date" name="start_date" value="{{ request('start_date') }}" class="form-input w-full rounded-lg border-slate-200">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Tanggal Akhir (Dikembalikan)</label>
                <input type="date" name="end_date" value="{{ request('end_date') }}" class="form-input w-full rounded-lg border-slate-200">
            </div>
            <div>
                <button type="submit" class="btn bg-white border-slate-200 hover:border-slate-300 text-slate-600 rounded-lg px-4 py-2">Filter</button>
                <a href="{{ route('reports.fines') }}" class="btn text-rose-500 hover:text-rose-600 ml-2">Reset</a>
            </div>
        </form>
    </div>
    
    <!-- Summary Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        <div class="bg-white p-5 shadow-sm rounded-xl border border-slate-200 flex items-center gap-4">
            <div class="w-12 h-12 rounded-full bg-emerald-100 flex items-center justify-center flex-shrink-0">
                <span class="text-xl font-bold text-emerald-600">Rp</span>
            </div>
            <div>
                <p class="text-sm text-slate-500 font-medium">Total Denda</p>
                <h3 class="text-2xl font-bold text-slate-800">Rp {{ number_format($fines->sum('fine'), 0, ',', '.') }}</h3>
            </div>
        </div>
        <div class="bg-white p-5 shadow-sm rounded-xl border border-slate-200 flex items-center gap-4">
            <div class="w-12 h-12 rounded-full bg-rose-100 flex items-center justify-center flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-rose-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div>
                <p class="text-sm text-slate-500 font-medium">Pelanggaran Terlambat</p>
                <h3 class="text-2xl font-bold text-slate-800">{{ $fines->count() }} Kali</h3>
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="bg-white shadow-lg rounded-2xl border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200">
                        <th class="px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wider">No</th>
                        <th class="px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wider">Anggota</th>
                        <th class="px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wider">Buku</th>
                        <th class="px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wider">Terlambat (Hari)</th>
                        <th class="px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wider">Tgl Dikembalikan</th>
                        <th class="px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wider">Denda</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($fines as $index => $b)
                    @php
                        $daysLate = 0;
                        if ($b->return_date && $b->due_date) {
                            $daysLate = \Carbon\Carbon::parse($b->due_date)->diffInDays(\Carbon\Carbon::parse($b->return_date), false);
                        }
                    @endphp
                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="px-5 py-4 text-sm text-slate-600">{{ $index + 1 }}</td>
                        <td class="px-5 py-4 text-sm font-medium text-slate-800">{{ $b->member->name }}</td>
                        <td class="px-5 py-4 text-sm text-slate-600">{{ $b->book->title }}</td>
                        <td class="px-5 py-4 text-sm text-slate-600">
                            {{ $daysLate > 0 ? $daysLate . ' Hari' : '-' }}
                        </td>
                        <td class="px-5 py-4 text-sm text-slate-600">
                            {{ $b->return_date ? \Carbon\Carbon::parse($b->return_date)->format('d M Y') : '-' }}
                        </td>
                        <td class="px-5 py-4 text-sm font-bold text-rose-600">Rp {{ number_format($b->fine, 0, ',', '.') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-5 py-8 text-center text-slate-500">Tidak ada data denda keterlambatan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
