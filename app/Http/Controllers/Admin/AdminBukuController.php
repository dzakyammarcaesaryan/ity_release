<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\log;


class AdminBukuController extends Controller
{
    public function index()
    {
        try {
            $buku = Buku::latest()->get();
            return view('admin.datapenjualan', compact('buku'));
        } catch (\Exception $e) {
            // Log error
            \Log::error('Error fetching buku: ' . $e->getMessage());

            // Redirect dengan pesan error
            return redirect()->back()->with('error', 'Gagal memuat data buku');
        }
    }

    public function create()
    {
        return view('admin.buku.addbuku');
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'isbn' => 'required|unique:buku,isbn',
            'judul' => 'required',
            'penulis' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'deskripsi' => 'nullable',
            'gambar' => 'nullable|image|max:2048'
        ]);

        // Proses upload gambar
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $namaGambar = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('buku'), $namaGambar);
            $validasi['gambar'] = $namaGambar;

        }

        Buku::create($validasi);

        return redirect()->route('admin.buku.index')
            ->with('success', 'Buku berhasil ditambahkan');
    }

    public function edit(Buku $buku)
    {
        return view('admin.buku.edit', compact('buku'));
    }

    public function update(Request $request, Buku $buku)
    {
        $validasi = $request->validate([
            'isbn' => 'required|unique:buku,isbn,' . $buku->id,
            'judul' => 'required',
            'penulis' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'deskripsi' => 'nullable',
            'gambar' => 'nullable|image|max:2048'
        ]);

        // Proses upload gambar baru
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($buku->gambar) {
                Storage::delete('public/buku/' . $buku->gambar);
            }

            $gambar = $request->file('gambar');
            $namaGambar = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('buku'), $namaGambar);
            $validasi['gambar'] = $namaGambar;
        }

        $buku->update($validasi);

        return redirect()->route('admin.buku.index')
            ->with('success', 'Buku berhasil diperbarui');
    }

    public function destroy(Buku $buku)
    {
        // Hapus gambar jika ada
        if ($buku->gambar) {
            Storage::delete('public/buku/' . $buku->gambar);
        }

        $buku->delete();

        return redirect()->route('admin.buku.index')
            ->with('success', 'Buku berhasil dihapus');
    }
    public function getGambarUrlAttribute()
{
    // Jika tidak ada gambar, gunakan default
    if (!$this->gambar) {
        return asset('images/default-book.png');
    }

    // Sesuaikan path sesuai struktur penyimpanan Anda
    return asset('storage/buku/' . $this->gambar);

 }
}