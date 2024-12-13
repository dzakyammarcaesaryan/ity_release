<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    // Nama tabel yang sesuai dengan migration
    protected $table = 'buku';

    // Primary key custom
    protected $primaryKey = 'id_buku';

    // Kolom yang dapat diisi
    protected $fillable = [
        'judul',
        'harga',
        'isbn',
        'penulis',
        'stok',
        'deskripsi',
        'gambar'
    ];

    public function getGambarUrlAttribute()
    {
        // Jika gambar kosong, kembalikan gambar default
        return $this->gambar
            ? asset('storage/gambar_buku/' . $this->gambar)
            : asset('images/default-book.png');
    }

    // Tipe data untuk beberapa kolom
    protected $casts = [
        'harga' => 'decimal:2',
        'stok' => 'integer'
    ];
}