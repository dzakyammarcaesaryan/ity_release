@extends('layouts.admin')

@section('content')
        <!-- Statistik Utama -->
        <div class="container-fluid">
            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="card bg-primary text-white stats-card">
                        <div class="card-body">
                            <h5 class="card-title">Total Penjualan</h5>
                            <h3>Rp 150,000,000</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-success text-white stats-card">
                        <div class="card-body">
                            <h5 class="card-title">Buku Terjual</h5>
                            <h3>3,200</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-info text-white stats-card">
                        <div class="card-body">
                            <h5 class="card-title">Buku Baru</h5>
                            <h3>120</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-warning text-white stats-card">
                        <div class="card-body">
                            <h5 class="card-title">Stok Habis</h5>
                            <h3>5</h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabel Penjualan dan Penerbitan -->
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Daftar Penjualan Terbaru</div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Judul Buku</th>
                                        <th>Jumlah</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#12345</td>
                                        <td>Pengantar Fisika</td>
                                        <td>5</td>
                                        <td><span class="badge bg-success">Selesai</span></td>
                                    </tr>
                                    <tr>
                                        <td>#12346</td>
                                        <td>Dasar Matematika</td>
                                        <td>3</td>
                                        <td><span class="badge bg-warning">Pending</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Status Penerbitan Terbaru</div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID Penerbitan</th>
                                        <th>Judul Buku</th>
                                        <th>Status</th>
                                        <th>Tanggal Terbit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>PUB001</td>
                                        <td>Sejarah Indonesia</td>
                                        <td><span class="badge bg-info">Dalam Proses</span></td>
                                        <td>2024-01-15</td>
                                    </tr>
                                    <tr>
                                        <td>PUB002</td>
                                        <td>Ilmu Komputer</td>
                                        <td><span class="badge bg-success">Terbit</span></td>
                                        <td>2024-02-10</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

