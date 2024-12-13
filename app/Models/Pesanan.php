<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    // Nama tabel
    protected $table = 'pesanan';

    // Primary key
    protected $primaryKey = 'id_pesanan';

    // Kolom yang bisa diisi
    protected $fillable = [
        'id_buku',
        'jumlah',
        'tanggal_pesanan',
        'status_pesanan'
    ];

    // Cast tipe data
    protected $casts = [
        'tanggal_pesanan' => 'date',
        'jumlah' => 'integer'
    ];

    // Relasi dengan Buku
    public function buku()
    {
        return $this->belongsTo(Buku::class, 'id_buku', 'id_buku');
    }

    // Scope untuk filter status pesanan
    public function scopeStatus($query, $status)
    {
        return $query->where('status_pesanan', $status);
    }

    // Mutator untuk menghitung total harga
    public function getTotalHargaAttribute()
    {
        return $this->buku->harga * $this->jumlah;
    }

    // Method untuk mengubah status pesanan
    public function ubahStatus($status)
    {
        $this->status_pesanan = $status;
        $this->save();
    }

    // Accessor untuk format tanggal
    public function getFormattedTanggalAttribute()
    {
        return $this->tanggal_pesanan->format('d M Y');
    }

    // Static method untuk membuat pesanan baru
    public static function buatPesanan($data)
    {
        // Cek ketersediaan stok
        $buku = Buku::findOrFail($data['id_buku']);

        if ($buku->stok < $data['jumlah']) {
            throw new \Exception('Stok tidak mencukupi');
        }

        // Kurangi stok buku
        $buku->kurangiStok($data['jumlah']);

        // Buat pesanan
        return self::create($data);
    }
}