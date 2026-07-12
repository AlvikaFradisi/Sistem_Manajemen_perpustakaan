@extends('layouts.app')

@section('content')
<div class="mb-6 flex flex-col md:flex-row md:items-center justify-between gap-4">
    <div>
        <h1 class="text-2xl font-bold text-slate-900">Detail Anggota</h1>
        <p class="text-sm text-slate-500">Informasi lengkap data anggota perpustakaan.</p>
    </div>
    <div class="flex items-center gap-3">
        <a href="{{ route('members.index') }}" class="px-4 py-2 text-sm font-medium text-slate-600 bg-white border border-slate-200 rounded-lg shadow-sm hover:bg-slate-50 hover:text-slate-900 transition-colors">
            Kembali
        </a>
        <a href="{{ route('members.edit', $member->id) }}" class="px-4 py-2 text-sm font-medium text-white bg-amber-500 rounded-lg shadow-sm hover:bg-amber-600 transition-colors">
            Edit Data
        </a>
    </div>
</div>

<div class="bg-white rounded-2xl border border-sky-100 shadow-sm overflow-hidden mb-6">
    <div class="p-6 md:p-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-y-6 gap-x-12">
            <div>
                <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Nama Lengkap</h3>
                <p class="text-base font-semibold text-slate-900">{{ $member->name }}</p>
            </div>
            <div>
                <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">NIM / ID</h3>
                <p class="text-base font-semibold text-slate-900">{{ $member->nim }}</p>
            </div>
            <div>
                <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Email</h3>
                <p class="text-base font-medium text-slate-700">{{ $member->email ?? '-' }}</p>
            </div>
            <div>
                <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Telepon</h3>
                <p class="text-base font-medium text-slate-700">{{ $member->phone ?? '-' }}</p>
            </div>
            <div class="md:col-span-2">
                <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Alamat</h3>
                <p class="text-base font-medium text-slate-700">{{ $member->address ?? '-' }}</p>
            </div>
            <div class="md:col-span-2">
                <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Terdaftar Pada</h3>
                <p class="text-base font-medium text-slate-700">{{ $member->created_at->format('d M Y, H:i') }}</p>
            </div>
        </div>
    </div>
</div>

<!-- Riwayat Peminjaman (Opsional: Ditampilkan jika ada) -->
<div class="bg-white rounded-2xl border border-sky-100 shadow-sm overflow-hidden">
    <div class="px-6 py-4 border-b border-sky-50">
        <h3 class="font-bold text-slate-900">Riwayat Peminjaman Buku</h3>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-sky-50/40 text-[11px] text-slate-400 uppercase tracking-widest font-semibold border-b border-sky-50">
                    <th class="px-4 py-4">Buku</th>
                    <th class="px-4 py-4">Tgl Pinjam</th>
                    <th class="px-4 py-4">Tenggat Waktu</th>
                    <th class="px-4 py-4 text-center">Status</th>
                    <th class="px-4 py-4 text-right">Denda</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-sky-50 text-sm whitespace-nowrap">
                @forelse($member->borrowings as $borrowing)
                <tr class="hover:bg-sky-50/30 transition-colors">
                    <td class="px-4 py-3">
                        <div class="font-bold text-slate-900">{{ $borrowing->book->title }}</div>
                    </td>
                    <td class="px-4 py-3 text-slate-600">{{ \Carbon\Carbon::parse($borrowing->borrow_date)->format('d M Y') }}</td>
                    <td class="px-4 py-3 text-slate-600">{{ \Carbon\Carbon::parse($borrowing->due_date)->format('d M Y') }}</td>
                    <td class="px-4 py-3 text-center">
                        @if($borrowing->status == 'Dipinjam')
                            <span class="inline-flex items-center gap-1.5 px-2 py-1 rounded-md text-[11px] font-bold bg-sky-50 text-sky-700 border border-sky-100">
                                Dipinjam
                            </span>
                        @elseif($borrowing->status == 'Dikembalikan')
                            <span class="inline-flex items-center gap-1.5 px-2 py-1 rounded-md text-[11px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-100">
                                Dikembalikan
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1.5 px-2 py-1 rounded-md text-[11px] font-bold bg-red-50 text-red-700 border border-red-100">
                                Terlambat
                            </span>
                        @endif
                    </td>
                    <td class="px-4 py-3 text-right font-medium text-slate-700">
                        Rp {{ number_format($borrowing->fine, 0, ',', '.') }}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-8 text-center text-slate-500">
                        Belum ada riwayat peminjaman untuk anggota ini.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
