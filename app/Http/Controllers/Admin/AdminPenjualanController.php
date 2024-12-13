<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use App\Models\Buku;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminPenjualanController extends Controller
{
    // Menampilkan halaman dashboard admin dengan data penjualan, buku, dan penerbitan
    public function index()
    {
        // Ambil data penjualan terbaru
        $pesanan = Pesanan::with('buku')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        // Ambil data buku
        $buku = Buku::paginate(10);

        // Data dummy untuk penerbitan (bisa diganti dengan model sebenarnya)
        $penerbitan = [
            [
                'id' => 'PUB001',
                'judul' => 'Data Science untuk Pemula',
                'penulis' => 'Prof. Robert Johnson',
                'tanggal_masuk' => '2024-01-01',
                'target_terbit' => '2024-03-01',
                'status' => 'Proses',
                'progress' => 70
            ]
        ];

        return view('admin.dashboard', compact('pesanan', 'buku', 'penerbitan'));
    }

    // Metode untuk export data penjualan
    public function exportPenjualan()
    {
        $pesanan = Pesanan::with('buku')->get();

        $pdf = PDF::loadView('admin.export.penjualan', compact('pesanan'));
        return $pdf->download('data_penjualan.pdf');
    }

    // Metode untuk menambah pesanan
    public function storePesanan(Request $request)
    {
        $validatedData = $request->validate([
            'id_buku' => 'required|exists:buku,id_buku',
            'jumlah' => 'required|integer|min:1',
            'nama_pembeli' => 'required|string|max:255',
            'status' => 'required|in:pending,diproses,selesai,dibatalkan'
        ]);

        try {
            $pesanan = Pesanan::create([
                'id_buku' => $validatedData['id_buku'],
                'jumlah' => $validatedData['jumlah'],
                'nama_pembeli' => $validatedData['nama_pembeli'],
                'status_pesanan' => $validatedData['status'],
                'tanggal_pesanan' => now()
            ]);

            return redirect()->back()->with('success', 'Pesanan berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan pesanan: ' . $e->getMessage());
        }
    }

    // Metode untuk update status pesanan
    public function updateStatusPesanan(Request $request, $id)
    {
        $validatedData = $request->validate([
            'status' => 'required|in:pending,diproses,selesai,dibatalkan'
        ]);

        try {
            $pesanan = Pesanan::findOrFail($id);
            $pesanan->update([
                'status_pesanan' => $validatedData['status']
            ]);

            return redirect()->back()->with('success', 'Status pesanan berhasil diupdate');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal update status pesanan: ' . $e->getMessage());
        }
    }

    // Metode untuk menghapus pesanan
    public function destroyPesanan($id)
    {
        try {
            $pesanan = Pesanan::findOrFail($id);
            $pesanan->delete();

            return redirect()->back()->with('success', 'Pesanan berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus pesanan: ' . $e->getMessage());
        }
    }
}