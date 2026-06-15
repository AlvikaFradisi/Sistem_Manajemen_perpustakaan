<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Borrowing extends Model
{
    protected $fillable = [
        'book_id',
        'member_name',
        'member_nim',
        'borrow_date',
        'due_date',
        'return_date',
        'status',
        'fine',
    ];

    // Relasi: Setiap Peminjaman adalah milik 1 Buku
    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}
