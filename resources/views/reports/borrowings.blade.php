@extends('layouts.app')

@section('content')
<div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
    
    <div class="sm:flex sm:justify-between sm:items-center mb-8">
        <div class="mb-4 sm:mb-0 flex items-center gap-3">
            <div class="p-2.5 bg-indigo-100 text-indigo-600 rounded-xl">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 md:h-7 md:w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
            </div>
            <h1 class="text-2xl md:text-3xl text-slate-800 font-bold tracking-tight">Laporan Peminjaman</h1>
        </div>
        <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">
            <a href="{{ route('reports.borrowings', ['print' => true] + request()->all()) }}" target="_blank" class="btn bg-sky-500 hover:bg-sky-600 text-white rounded-lg px-4 py-2 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                </svg>
                Cetak Laporan
            </a>
        </div>
    </div>

    <!-- Filter -->
    <div class="bg-white p-5 shadow-sm rounded-xl border border-slate-200 mb-8">
        <form action="{{ route('reports.borrowings') }}" method="GET" class="flex flex-col sm:flex-row gap-4 items-end">
            <div>
                <label class="block text-sm font-medium mb-1">Tanggal Mulai</label>
                <input type="date" name="start_date" value="{{ request('start_date') }}" class="form-input w-full rounded-lg border-slate-200">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Tanggal Akhir</label>
                <input type="date" name="end_date" value="{{ request('end_date') }}" class="form-input w-full rounded-lg border-slate-200">
            </div>
            <div>
                <button type="submit" class="btn bg-white border-slate-200 hover:border-slate-300 text-slate-600 rounded-lg px-4 py-2">Filter</button>
                <a href="{{ route('reports.borrowings') }}" class="btn text-rose-500 hover:text-rose-600 ml-2">Reset</a>
            </div>
        </form>
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
                        <th class="px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wider">Tgl Pinjam</th>
                        <th class="px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wider">Jatuh Tempo</th>
                        <th class="px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wider">Tgl Kembali</th>
                        <th class="px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($borrowings as $index => $b)
                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="px-5 py-4 text-sm text-slate-600">{{ $index + 1 }}</td>
                        <td class="px-5 py-4 text-sm font-medium text-slate-800">{{ $b->member->name ?? 'Dihapus' }}</td>
                        <td class="px-5 py-4 text-sm text-slate-600">{{ $b->book->title ?? 'Dihapus' }}</td>
                        <td class="px-5 py-4 text-sm text-slate-600">{{ \Carbon\Carbon::parse($b->borrow_date)->format('d M Y') }}</td>
                        <td class="px-5 py-4 text-sm text-slate-600">{{ \Carbon\Carbon::parse($b->due_date)->format('d M Y') }}</td>
                        <td class="px-5 py-4 text-sm text-slate-600">{{ $b->return_date ? \Carbon\Carbon::parse($b->return_date)->format('d M Y') : '-' }}</td>
                        <td class="px-5 py-4 text-sm">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold
                                {{ $b->status === 'Dipinjam' ? 'bg-sky-100 text-sky-700' : 
                                  ($b->status === 'Dikembalikan' ? 'bg-emerald-100 text-emerald-700' : 
                                  ($b->status === 'Rusak' ? 'bg-orange-100 text-orange-700' : 
                                  ($b->status === 'Hilang' ? 'bg-red-100 text-red-700' : 'bg-rose-100 text-rose-700'))) }}">
                                {{ $b->status }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-5 py-8 text-center text-slate-500">Tidak ada data peminjaman.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
