<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    // Mendaftarkan kolom mana saja yang boleh diisi secara massal (Mass Assignment)
    protected $fillable = [
        'title',
        'author',
        'isbn',
        'publisher',
        'year',
        'category',
        'stock',
        'description',
        'image',
    ];

    // Relasi: 1 Buku bisa memiliki banyak riwayat Peminjaman (Borrowing)
    public function borrowings(): HasMany
    {
        return $this->hasMany(Borrowing::class);
    }
}
