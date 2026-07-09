@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-slate-900 tracking-tight">Detail / Update Status Peminjaman</h1>
            <p class="text-slate-500 mt-1">Perbarui status peminjaman (contoh: pengembalian buku) dan denda.</p>
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

    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden mb-6">
        <div class="p-6 md:p-8 bg-slate-50 border-b border-slate-200">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <h4 class="text-xs uppercase tracking-wider font-semibold text-slate-400 mb-1">Informasi Buku</h4>
                    <p class="font-semibold text-slate-800 text-lg">{{ $borrowing->book->title ?? 'Buku Dihapus' }}</p>
                </div>
                <div>
                    <h4 class="text-xs uppercase tracking-wider font-semibold text-slate-400 mb-1">Informasi Peminjam</h4>
                    <p class="font-semibold text-slate-800 text-lg">{{ $borrowing->member_name }} <span class="text-sm font-normal text-slate-500">({{ $borrowing->member_nim }})</span></p>
                </div>
                <div>
                    <h4 class="text-xs uppercase tracking-wider font-semibold text-slate-400 mb-1">Tanggal Pinjam</h4>
                    <p class="text-slate-800">{{ \Carbon\Carbon::parse($borrowing->borrow_date)->format('d F Y') }}</p>
                </div>
                <div>
                    <h4 class="text-xs uppercase tracking-wider font-semibold text-slate-400 mb-1">Jatuh Tempo</h4>
                    <p class="text-slate-800">{{ \Carbon\Carbon::parse($borrowing->due_date)->format('d F Y') }}</p>
                </div>
            </div>
        </div>

        <form action="{{ route('borrowings.update', $borrowing->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="p-6 md:p-8 space-y-6">
                <!-- Data Update Peminjaman -->
                <div>
                    <h3 class="text-lg font-semibold text-slate-900 mb-4 pb-2 border-b border-slate-100">Update Status Peminjaman</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        
                        <div>
                            <label for="status" class="block text-sm font-medium text-slate-700 mb-1">Status Peminjaman <span class="text-sky-500">*</span></label>
                            <select name="status" id="status" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-lg text-sm focus:bg-white focus:ring-2 focus:ring-sky-500 focus:border-sky-500 transition-all @error('status') border-sky-500 @enderror" required {{ $borrowing->status !== 'Dipinjam' ? 'disabled' : '' }}>
                                <option value="Dipinjam" {{ old('status', $borrowing->status) == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                                <option value="Dikembalikan" {{ old('status', $borrowing->status) == 'Dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                                <option value="Terlambat" {{ old('status', $borrowing->status) == 'Terlambat' ? 'selected' : '' }}>Terlambat</option>
                            </select>
                            @if($borrowing->status !== 'Dipinjam')
                                <input type="hidden" name="status" value="{{ $borrowing->status }}">
                                <p class="mt-1 text-xs text-slate-500">Buku sudah dikembalikan. Status tidak bisa diubah.</p>
                            @endif
                            @error('status')
                                <p class="mt-1 text-sm text-sky-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="return_date" class="block text-sm font-medium text-slate-700 mb-1">Tanggal Dikembalikan</label>
                            <input type="date" name="return_date" id="return_date" value="{{ old('return_date', $borrowing->return_date) }}" 
                                class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-lg text-sm focus:bg-white focus:ring-2 focus:ring-sky-500 focus:border-sky-500 transition-all @error('return_date') border-sky-500 @enderror" 
                                {{ $borrowing->status !== 'Dipinjam' ? 'disabled' : '' }}>
                            @if($borrowing->status !== 'Dipinjam')
                                <input type="hidden" name="return_date" value="{{ $borrowing->return_date }}">
                            @endif
                            @error('return_date')
                                <p class="mt-1 text-sm text-sky-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="fine" class="block text-sm font-medium text-slate-700 mb-1">Denda Keterlambatan (Rp)</label>
                            <input type="number" name="fine" id="fine" value="{{ old('fine', $borrowing->fine) }}" min="0" 
                                class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-lg text-sm focus:bg-white focus:ring-2 focus:ring-sky-500 focus:border-sky-500 transition-all @error('fine') border-sky-500 @enderror" 
                                {{ $borrowing->status !== 'Dipinjam' ? 'disabled' : '' }}>
                            @if($borrowing->status !== 'Dipinjam')
                                <input type="hidden" name="fine" value="{{ $borrowing->fine }}">
                            @else
                                <p class="mt-1 text-xs text-slate-500">Biarkan kosong untuk menghitung denda otomatis jika terlambat.</p>
                            @endif
                            @error('fine')
                                <p class="mt-1 text-sm text-sky-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            @if($borrowing->status === 'Dipinjam')
            <!-- Footer & Buttons -->
            <div class="px-6 py-4 bg-slate-50 border-t border-slate-200 flex items-center justify-end gap-3">
                <a href="{{ route('borrowings.index') }}" class="px-5 py-2.5 text-sm font-medium text-slate-700 bg-white border border-slate-300 rounded-lg hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-500 transition-colors">
                    Batal
                </a>
                <button type="submit" class="px-5 py-2.5 text-sm font-semibold text-white bg-gradient-to-r from-sky-600 to-sky-300 rounded-lg shadow-sm hover:from-sky-700 hover:to-sky-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500 transition-colors flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                    Simpan Perubahan
                </button>
            </div>
            @endif
        </form>
    </div>
</div>
@endsection
