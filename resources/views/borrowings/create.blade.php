@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-slate-900 tracking-tight">Tambah Peminjaman Baru</h1>
            <p class="text-slate-500 mt-1">Catat data peminjaman buku oleh anggota perpustakaan.</p>
        </div>
        <a href="{{ route('borrowings.index') }}" class="inline-flex items-center text-sm font-medium text-slate-500 hover:text-slate-700 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
            </svg>
            Kembali
        </a>
    </div>

    @if(session('error'))
    <div class="mb-6 bg-sky-50 border border-sky-200 p-4 rounded-lg flex items-center gap-3">
        <div class="bg-sky-100 p-1.5 rounded-full">
            <svg class="h-5 w-5 text-sky-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
            </svg>
        </div>
        <p class="text-sky-800 font-medium text-sm">{{ session('error') }}</p>
    </div>
    @endif

    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
        <form action="{{ route('borrowings.store') }}" method="POST">
            @csrf
            
            <div class="p-6 md:p-8 space-y-6">
                <!-- Data Peminjam -->
                <div>
                    <h3 class="text-lg font-semibold text-slate-900 mb-4 pb-2 border-b border-slate-100">Informasi Peminjam</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-2">
                            <label for="member_id" class="block text-sm font-medium text-slate-700 mb-1">Pilih Anggota <span class="text-sky-500">*</span></label>
                            <select name="member_id" id="member_id" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-lg text-sm focus:bg-white focus:ring-2 focus:ring-sky-500 focus:border-sky-500 transition-all @error('member_id') border-sky-500 @enderror" required>
                                <option value="">-- Pilih Anggota --</option>
                                @foreach($members as $member)
                                    <option value="{{ $member->id }}" {{ old('member_id') == $member->id ? 'selected' : '' }}>
                                        {{ $member->name }} ({{ $member->nim }})
                                    </option>
                                @endforeach
                            </select>
                            @error('member_id')
                                <p class="mt-1 text-sm text-sky-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Data Buku & Tanggal -->
                <div>
                    <h3 class="text-lg font-semibold text-slate-900 mb-4 pb-2 border-b border-slate-100 mt-8">Detail Peminjaman</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-2">
                            <label for="book_id" class="block text-sm font-medium text-slate-700 mb-1">Pilih Buku <span class="text-sky-500">*</span></label>
                            <select name="book_id" id="book_id" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-lg text-sm focus:bg-white focus:ring-2 focus:ring-sky-500 focus:border-sky-500 transition-all @error('book_id') border-sky-500 @enderror" required>
                                <option value="">-- Pilih Buku yang Tersedia --</option>
                                @foreach($books as $book)
                                    <option value="{{ $book->id }}" {{ old('book_id') == $book->id ? 'selected' : '' }}>
                                        {{ $book->title }} (Stok: {{ $book->stock }})
                                    </option>
                                @endforeach
                            </select>
                            @error('book_id')
                                <p class="mt-1 text-sm text-sky-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="borrow_date" class="block text-sm font-medium text-slate-700 mb-1">Tanggal Pinjam <span class="text-sky-500">*</span></label>
                            <input type="date" name="borrow_date" id="borrow_date" value="{{ old('borrow_date', date('Y-m-d')) }}" 
                                class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-lg text-sm focus:bg-white focus:ring-2 focus:ring-sky-500 focus:border-sky-500 transition-all @error('borrow_date') border-sky-500 @enderror" 
                                required>
                            @error('borrow_date')
                                <p class="mt-1 text-sm text-sky-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="due_date" class="block text-sm font-medium text-slate-700 mb-1">Tenggat Waktu (Jatuh Tempo) <span class="text-sky-500">*</span></label>
                            <input type="date" name="due_date" id="due_date" value="{{ old('due_date', date('Y-m-d', strtotime('+3 days'))) }}" 
                                class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-lg text-sm focus:bg-white focus:ring-2 focus:ring-sky-500 focus:border-sky-500 transition-all @error('due_date') border-sky-500 @enderror" 
                                required>
                            @error('due_date')
                                <p class="mt-1 text-sm text-sky-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer & Buttons -->
            <div class="px-6 py-4 bg-slate-50 border-t border-slate-200 flex items-center justify-end gap-3">
                <a href="{{ route('borrowings.index') }}" class="px-5 py-2.5 text-sm font-medium text-slate-700 bg-white border border-slate-300 rounded-lg hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-500 transition-colors">
                    Batal
                </a>
                <button type="submit" class="px-5 py-2.5 text-sm font-semibold text-white bg-sky-500 rounded-lg shadow-sm hover:bg-sky-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500 transition-colors flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                    Simpan Data
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
