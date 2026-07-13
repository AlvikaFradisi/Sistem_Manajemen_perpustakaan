@extends('reports.layout-print')

@section('title', 'Laporan Masuk Buku Baru')

@section('content')
<p style="margin-bottom: 20px; font-size: 14px;">
    Periode: 
    @if(request('start_date') || request('end_date'))
        {{ request('start_date') ? \Carbon\Carbon::parse(request('start_date'))->format('d M Y') : 'Awal' }} 
        s/d 
        {{ request('end_date') ? \Carbon\Carbon::parse(request('end_date'))->format('d M Y') : 'Sekarang' }}
    @else
        Semua Waktu
    @endif
</p>

<table>
    <thead>
        <tr>
            <th style="width: 5%">No</th>
            <th style="width: 35%">Judul Buku</th>
            <th style="width: 25%">Penulis</th>
            <th style="width: 15%">Kategori</th>
            <th style="width: 5%">Stok</th>
            <th style="width: 15%">Tgl Masuk</th>
        </tr>
    </thead>
    <tbody>
        @forelse($books as $index => $book)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $book->title }}</td>
            <td>{{ $book->author }}</td>
            <td>{{ $book->category }}</td>
            <td>{{ $book->stock }}</td>
            <td>{{ $book->created_at->format('d/m/Y') }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="6" style="text-align: center;">Tidak ada data buku masuk pada periode ini.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
