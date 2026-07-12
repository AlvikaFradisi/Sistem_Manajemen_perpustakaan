@extends('layouts.app')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <div>
        <h1 class="text-2xl font-bold text-slate-900">Tambah Anggota Baru</h1>
        <p class="text-sm text-slate-500">Silakan isi formulir di bawah ini untuk menambahkan anggota baru.</p>
    </div>
    <a href="{{ route('members.index') }}" class="px-4 py-2 text-sm font-medium text-slate-600 bg-white border border-slate-200 rounded-lg shadow-sm hover:bg-slate-50 hover:text-slate-900 transition-colors">
        Kembali
    </a>
</div>

<div class="bg-white rounded-2xl border border-sky-100 shadow-sm overflow-hidden">
    <form action="{{ route('members.store') }}" method="POST" class="p-6 sm:p-8">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div class="md:col-span-2">
                <label for="name" class="block text-sm font-semibold text-slate-700 mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                    class="w-full px-4 py-2.5 rounded-xl border {{ $errors->has('name') ? 'border-red-300 focus:border-red-500 focus:ring-red-500' : 'border-slate-200 focus:border-sky-500 focus:ring-sky-500' }} focus:outline-none focus:ring-2 focus:ring-opacity-20 transition-colors"
                    placeholder="Masukkan nama lengkap">
                @error('name')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="nim" class="block text-sm font-semibold text-slate-700 mb-2">NIM / ID Anggota <span class="text-red-500">*</span></label>
                <input type="text" name="nim" id="nim" value="{{ old('nim') }}" required
                    class="w-full px-4 py-2.5 rounded-xl border {{ $errors->has('nim') ? 'border-red-300 focus:border-red-500 focus:ring-red-500' : 'border-slate-200 focus:border-sky-500 focus:ring-sky-500' }} focus:outline-none focus:ring-2 focus:ring-opacity-20 transition-colors"
                    placeholder="Masukkan NIM atau ID">
                @error('nim')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-semibold text-slate-700 mb-2">Email (Opsional)</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                    class="w-full px-4 py-2.5 rounded-xl border {{ $errors->has('email') ? 'border-red-300 focus:border-red-500 focus:ring-red-500' : 'border-slate-200 focus:border-sky-500 focus:ring-sky-500' }} focus:outline-none focus:ring-2 focus:ring-opacity-20 transition-colors"
                    placeholder="Masukkan alamat email">
                @error('email')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="md:col-span-2">
                <label for="phone" class="block text-sm font-semibold text-slate-700 mb-2">Nomor Telepon (Opsional)</label>
                <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                    class="w-full px-4 py-2.5 rounded-xl border {{ $errors->has('phone') ? 'border-red-300 focus:border-red-500 focus:ring-red-500' : 'border-slate-200 focus:border-sky-500 focus:ring-sky-500' }} focus:outline-none focus:ring-2 focus:ring-opacity-20 transition-colors"
                    placeholder="Contoh: 08123456789">
                @error('phone')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="md:col-span-2">
                <label for="address" class="block text-sm font-semibold text-slate-700 mb-2">Alamat (Opsional)</label>
                <textarea name="address" id="address" rows="3"
                    class="w-full px-4 py-2.5 rounded-xl border {{ $errors->has('address') ? 'border-red-300 focus:border-red-500 focus:ring-red-500' : 'border-slate-200 focus:border-sky-500 focus:ring-sky-500' }} focus:outline-none focus:ring-2 focus:ring-opacity-20 transition-colors"
                    placeholder="Masukkan alamat lengkap">{{ old('address') }}</textarea>
                @error('address')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="flex justify-end gap-3 pt-6 border-t border-slate-100">
            <button type="reset" class="px-5 py-2.5 text-sm font-medium text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-xl transition-colors">
                Reset
            </button>
            <button type="submit" class="px-5 py-2.5 text-sm font-medium text-white bg-sky-600 hover:bg-sky-700 rounded-xl shadow-md transition-colors">
                Simpan Data Anggota
            </button>
        </div>
    </form>
</div>
@endsection
