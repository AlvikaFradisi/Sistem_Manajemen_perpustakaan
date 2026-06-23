@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-slate-900 tracking-tight">Tambah Buku Baru</h1>
            <p class="text-slate-500 mt-1">Masukkan informasi detail buku untuk menambahkannya ke koleksi perpustakaan.</p>
        </div>
        <a href="{{ route('books.index') }}" class="inline-flex items-center text-sm font-medium text-slate-500 hover:text-slate-700 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
            </svg>
            Kembali
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
        <form action="{{ route('books.store') }}" method="POST">
            @csrf
            
            <div class="p-6 md:p-8 space-y-6">
                <!-- Section: Informasi Utama -->
                <div>
                    <h3 class="text-lg font-semibold text-slate-900 mb-4 pb-2 border-b border-slate-100">Informasi Utama</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Judul Buku -->
                        <div class="md:col-span-2">
                            <label for="title" class="block text-sm font-medium text-slate-700 mb-1">Judul Buku <span class="text-rose-500">*</span></label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}" 
                                class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-lg text-sm focus:bg-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all @error('title') border-rose-500 focus:ring-rose-500 focus:border-rose-500 @enderror" 
                                placeholder="Contoh: Laskar Pelangi" required>
                            @error('title')
                                <p class="mt-1 text-sm text-rose-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Penulis -->
                        <div>
                            <label for="author" class="block text-sm font-medium text-slate-700 mb-1">Penulis <span class="text-rose-500">*</span></label>
                            <input type="text" name="author" id="author" value="{{ old('author') }}" 
                                class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-lg text-sm focus:bg-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all @error('author') border-rose-500 focus:ring-rose-500 focus:border-rose-500 @enderror" 
                                placeholder="Nama penulis" required>
                            @error('author')
                                <p class="mt-1 text-sm text-rose-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- ISBN -->
                        <div>
                            <label for="isbn" class="block text-sm font-medium text-slate-700 mb-1">ISBN <span class="text-rose-500">*</span></label>
                            <input type="text" name="isbn" id="isbn" value="{{ old('isbn') }}" 
                                class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-lg text-sm focus:bg-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all @error('isbn') border-rose-500 focus:ring-rose-500 focus:border-rose-500 @enderror" 
                                placeholder="Contoh: 978-602-8519-93-9" required>
                            @error('isbn')
                                <p class="mt-1 text-sm text-rose-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Section: Detail Tambahan -->
                <div>
                    <h3 class="text-lg font-semibold text-slate-900 mb-4 pb-2 border-b border-slate-100 mt-8">Detail Tambahan</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Penerbit -->
                        <div>
                            <label for="publisher" class="block text-sm font-medium text-slate-700 mb-1">Penerbit</label>
                            <input type="text" name="publisher" id="publisher" value="{{ old('publisher') }}" 
                                class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-lg text-sm focus:bg-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all @error('publisher') border-rose-500 focus:ring-rose-500 focus:border-rose-500 @enderror" 
                                placeholder="Nama penerbit">
                            @error('publisher')
                                <p class="mt-1 text-sm text-rose-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Tahun Terbit -->
                        <div>
                            <label for="year" class="block text-sm font-medium text-slate-700 mb-1">Tahun Terbit</label>
                            <input type="number" name="year" id="year" value="{{ old('year') }}" 
                                class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-lg text-sm focus:bg-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all @error('year') border-rose-500 focus:ring-rose-500 focus:border-rose-500 @enderror" 
                                placeholder="Contoh: 2023">
                            @error('year')
                                <p class="mt-1 text-sm text-rose-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Kategori -->
                        <div>
                            <label for="category" class="block text-sm font-medium text-slate-700 mb-1">Kategori</label>
                            <input type="text" name="category" id="category" value="{{ old('category') }}" 
                                class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-lg text-sm focus:bg-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all @error('category') border-rose-500 focus:ring-rose-500 focus:border-rose-500 @enderror" 
                                placeholder="Contoh: Fiksi, Sains, Sejarah">
                            @error('category')
                                <p class="mt-1 text-sm text-rose-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Stok -->
                        <div>
                            <label for="stock" class="block text-sm font-medium text-slate-700 mb-1">Stok Tersedia <span class="text-rose-500">*</span></label>
                            <input type="number" name="stock" id="stock" value="{{ old('stock', 0) }}" min="0" 
                                class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-lg text-sm focus:bg-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all @error('stock') border-rose-500 focus:ring-rose-500 focus:border-rose-500 @enderror" 
                                required>
                            @error('stock')
                                <p class="mt-1 text-sm text-rose-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Deskripsi -->
                        <div class="md:col-span-2">
                            <label for="description" class="block text-sm font-medium text-slate-700 mb-1">Deskripsi/Sinopsis</label>
                            <textarea name="description" id="description" rows="4" 
                                class="w-full px-4 py-2.5 bg-slate-50 border border-slate-300 rounded-lg text-sm focus:bg-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all @error('description') border-rose-500 focus:ring-rose-500 focus:border-rose-500 @enderror" 
                                placeholder="Tuliskan sinopsis atau deskripsi singkat buku ini...">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-rose-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer & Buttons -->
            <div class="px-6 py-4 bg-slate-50 border-t border-slate-200 flex items-center justify-end gap-3">
                <a href="{{ route('books.index') }}" class="px-5 py-2.5 text-sm font-medium text-slate-700 bg-white border border-slate-300 rounded-lg hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-500 transition-colors">
                    Batal
                </a>
                <button type="submit" class="px-5 py-2.5 text-sm font-semibold text-white bg-indigo-600 rounded-lg shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                    Simpan Buku
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
