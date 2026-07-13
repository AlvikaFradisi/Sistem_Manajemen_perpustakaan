@extends('layouts.app')

@section('content')
<div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
    
    <div class="sm:flex sm:justify-between sm:items-center mb-8">
        <div class="mb-4 sm:mb-0">
            <h1 class="text-2xl md:text-3xl text-slate-800 font-bold">Laporan Buku Masuk 📚</h1>
        </div>
        <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">
            <a href="{{ route('reports.books', ['print' => true] + request()->all()) }}" target="_blank" class="btn bg-sky-500 hover:bg-sky-600 text-white rounded-lg px-4 py-2 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                </svg>
                Cetak Laporan
            </a>
        </div>
    </div>

    <!-- Filter -->
    <div class="bg-white p-5 shadow-sm rounded-xl border border-slate-200 mb-8">
        <form action="{{ route('reports.books') }}" method="GET" class="flex flex-col sm:flex-row gap-4 items-end">
            <div>
                <label class="block text-sm font-medium mb-1">Tanggal Mulai (Masuk)</label>
                <input type="date" name="start_date" value="{{ request('start_date') }}" class="form-input w-full rounded-lg border-slate-200">
            </div>
            <div>
                <label class="block text-sm font-medium mb-1">Tanggal Akhir (Masuk)</label>
                <input type="date" name="end_date" value="{{ request('end_date') }}" class="form-input w-full rounded-lg border-slate-200">
            </div>
            <div>
                <button type="submit" class="btn bg-white border-slate-200 hover:border-slate-300 text-slate-600 rounded-lg px-4 py-2">Filter</button>
                <a href="{{ route('reports.books') }}" class="btn text-rose-500 hover:text-rose-600 ml-2">Reset</a>
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
                        <th class="px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wider">Judul Buku</th>
                        <th class="px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wider">Penulis</th>
                        <th class="px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wider">Kategori</th>
                        <th class="px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wider">Stok</th>
                        <th class="px-5 py-4 text-xs font-semibold text-slate-500 uppercase tracking-wider">Tgl Masuk</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($books as $index => $book)
                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="px-5 py-4 text-sm text-slate-600">{{ $index + 1 }}</td>
                        <td class="px-5 py-4 text-sm font-medium text-slate-800">{{ $book->title }}</td>
                        <td class="px-5 py-4 text-sm text-slate-600">{{ $book->author }}</td>
                        <td class="px-5 py-4 text-sm text-slate-600">{{ $book->category }}</td>
                        <td class="px-5 py-4 text-sm font-bold text-slate-600">{{ $book->stock }}</td>
                        <td class="px-5 py-4 text-sm text-slate-600">{{ $book->created_at->format('d M Y') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-5 py-8 text-center text-slate-500">Tidak ada data buku masuk.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
