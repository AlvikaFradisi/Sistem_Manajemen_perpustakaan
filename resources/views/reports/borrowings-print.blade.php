@extends('reports.layout-print')

@section('title', 'Laporan Sirkulasi Peminjaman')

@section('content')
<p style="margin-bottom: 20px; font-size: 14px;">
    Periode: 
    @if(request('start_date') && request('end_date'))
        {{ \Carbon\Carbon::parse(request('start_date'))->format('d M Y') }} s/d {{ \Carbon\Carbon::parse(request('end_date'))->format('d M Y') }}
    @else
        Semua Waktu
    @endif
</p>

<table>
    <thead>
        <tr>
            <th style="width: 5%">No</th>
            <th style="width: 20%">Nama Anggota</th>
            <th style="width: 25%">Judul Buku</th>
            <th style="width: 15%">Tgl Pinjam</th>
            <th style="width: 15%">Jatuh Tempo</th>
            <th style="width: 15%">Tgl Kembali</th>
            <th style="width: 5%">Status</th>
        </tr>
    </thead>
    <tbody>
        @forelse($borrowings as $index => $b)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $b->member->name ?? 'Dihapus' }}</td>
            <td>{{ $b->book->title ?? 'Dihapus' }}</td>
            <td>{{ \Carbon\Carbon::parse($b->borrow_date)->format('d/m/Y') }}</td>
            <td>{{ \Carbon\Carbon::parse($b->due_date)->format('d/m/Y') }}</td>
            <td>{{ $b->return_date ? \Carbon\Carbon::parse($b->return_date)->format('d/m/Y') : '-' }}</td>
            <td>{{ $b->status }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="7" style="text-align: center;">Tidak ada data peminjaman pada periode ini.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
