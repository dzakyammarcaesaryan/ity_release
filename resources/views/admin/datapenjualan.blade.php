@extends('layouts.admin')

@section('content')
    <!-- Data Penjualan -->
<div class="container-fluid main-content">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Data Penjualan</h5>
            <button class="btn btn-primary btn-sm">
                <i class="fas fa-download me-1"></i> Export Data
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID Pesanan</th>
                            <th>Tanggal</th>
                            <th>Nama Pembeli</th>
                            <th>Judul Buku</th>
                            <th>Jumlah</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#ORD001</td>
                            <td>2024-01-15</td>
                            <td>John Doe</td>
                            <td>Pengantar AI</td>
                            <td>2</td>
                            <td>Rp 500.000</td>
                            <td><span class="badge bg-success">Selesai</span></td>
                            <td>
                                <button class="btn btn-info btn-sm"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <!-- Tambahkan baris data lainnya -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Tombol Tambah Buku -->
    {{-- <div class="row">
        <div class="col-12"> --}}
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6>Daftar Buku</h6>
                    <a href="{{ route('admin.buku.create') }}" class="btn btn-primary btn-sm mb-0">
                        <i class="fas fa-plus"></i> Tambah Buku
                    </a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    @if(session('success'))
                        <div class="alert alert-success text-white mx-4 mt-3">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Gambar</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Judul</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ISBN</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Penulis</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Stok</th>
                                    <th class="text-secondary opacity-7">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($buku) && $buku->count() > 0)
                                    @foreach($buku as $b)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <img src="{{ asset('/buku/'.$b->gambar) ?? asset('images/default-book.png') }}"
                                                         class="avatar avatar-sm me-3 " height="80vh"
                                                         alt="{{ $b->judul }}">
                                                </div>
                                            </td>
                                            <td>
                                                <h6 class="mb-0 text-sm">{{ $b->judul }}</h6>
                                            </td>
                                            <td>
                                                <p class="text-xs text-secondary mb-0">{{ $b->isbn }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $b->penulis }}</p>
                                            </td>
                                            <td>
                                                <p class="text-xs text-secondary mb-0">Rp {{ number_format($b->harga, 0, ',', '.') }}</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="badge badge-sm
                                                    {{ $b->stok > 10 ? 'bg-gradient-success' :
                                                       ($b->stok > 0 ? 'bg-gradient-warning' : 'bg-gradient-danger') }}">
                                                    {{ $b->stok }} Stok
                                                </span>
                                            </td>
                                            <td class="align-middle">
                                                <div class="d-flex">
                                                    <a href="{{ route('admin.buku.edit', $b->id_buku) }}"
                                                       class="btn btn-link text-warning px-2 mb-0"
                                                       data-toggle="tooltip"
                                                       title="Edit Buku">
                                                        <i class="fas fa-edit text-warning"></i>
                                                    </a>
                                                    <form action="{{ route('admin.buku.destroy', $b->id_buku) }}"
                                                          method="POST"
                                                          class="d-inline"
                                                          onsubmit="return confirm('Yakin hapus buku?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                                class="btn btn-link text-danger px-2 mb-0"
                                                                data-toggle="tooltip"
                                                                title="Hapus Buku">
                                                            <i class="fas fa-trash text-danger"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="7" class="text-center text-muted py-4">
                                            Tidak ada data buku
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        {{-- </div>
    </div> --}}

    <!-- Data Penerbitan -->
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Data Penerbitan</h5>
            <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#tambahPenerbitanModal">
                <i class="fas fa-plus me-1"></i> Tambah Penerbitan
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID Penerbitan</th>
                            <th>Judul Buku</th>
                            <th>Penulis</th>
                            <th>Tanggal Masuk</th>
                            <th>Target Terbit</th>
                            <th>Status</th>
                            <th>Progress</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>PUB001</td>
                            <td>Data Science untuk Pemula</td>
                            <td>Prof. Robert Johnson</td>
                            <td>2024-01-01</td>
                            <td>2024-03-01</td>
                            <td><span class="badge bg-warning">Proses</span></td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 70%">70%</div>
                                </div>
                            </td>
                            <td>
                                <button class="btn btn-info btn-sm"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <!-- Tambahkan baris data lainnya -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Buku -->
<div class="modal fade" id="tambahBukuModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Buku Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label">ISBN</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Judul Buku</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Penulis</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Stok</label>
                        <input type="number" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga</label>
                        <input type="number" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Tambah Penerbitan -->
<div class="modal fade" id="tambahPenerbitanModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Penerbitan Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label">Judul Buku</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Penulis</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal Masuk</label>
                        <input type="date" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Target Terbit</label>
                        <input type="date" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-select">
                            <option>Persiapan</option>
                            <option>Proses</option>
                            <option>Revisi</option>
                            <option>Cetak</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
    // Tooltip aktivasi
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>
@endsection
