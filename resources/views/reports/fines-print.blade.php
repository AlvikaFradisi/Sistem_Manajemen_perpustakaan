@extends('reports.layout-print')

@section('title', 'Laporan Keuangan Denda')

@section('content')
<p style="margin-bottom: 20px; font-size: 14px; display: flex; justify-content: space-between;">
    <span>
        Periode Pengembalian: 
        @if(request('start_date') && request('end_date'))
            {{ \Carbon\Carbon::parse(request('start_date'))->format('d M Y') }} s/d {{ \Carbon\Carbon::parse(request('end_date'))->format('d M Y') }}
        @else
            Semua Waktu
        @endif
    </span>
    <strong>Total Pendapatan Denda: Rp {{ number_format($fines->sum('fine'), 0, ',', '.') }}</strong>
</p>

<table>
    <thead>
        <tr>
            <th style="width: 5%">No</th>
            <th style="width: 25%">Nama Anggota</th>
            <th style="width: 30%">Judul Buku</th>
            <th style="width: 15%">Keterlambatan</th>
            <th style="width: 10%">Tgl Kembali</th>
            <th style="width: 15%">Jumlah Denda</th>
        </tr>
    </thead>
    <tbody>
        @forelse($fines as $index => $b)
        @php
            $daysLate = 0;
            if ($b->return_date && $b->due_date) {
                $daysLate = \Carbon\Carbon::parse($b->due_date)->diffInDays(\Carbon\Carbon::parse($b->return_date), false);
            }
        @endphp
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $b->member->name }}</td>
            <td>{{ $b->book->title }}</td>
            <td>{{ $daysLate > 0 ? $daysLate . ' Hari' : '-' }}</td>
            <td>{{ $b->return_date ? \Carbon\Carbon::parse($b->return_date)->format('d/m/Y') : '-' }}</td>
            <td>Rp {{ number_format($b->fine, 0, ',', '.') }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="6" style="text-align: center;">Tidak ada penerimaan denda pada periode ini.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
