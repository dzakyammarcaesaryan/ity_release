@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Tambah Buku Baru</h4>
                </div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.buku.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Gambar Buku</label>
                                    <input type="file"
                                           class="form-control"
                                           name="gambar"
                                           accept="image/*"
                                           onchange="previewImage(event)">
                                    <img id="preview"
                                         src=""
                                         alt="Preview Gambar"
                                         class="img-fluid mt-2"
                                         style="max-height: 250px; display: none;">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label class="form-label">Judul Buku</label>
                                    <input type="text"
                                           class="form-control"
                                           name="judul"
                                           value="{{ old('judul') }}"
                                           required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">ISBN</label>
                                    <input type="text"
                                           class="form-control"
                                           name="isbn"
                                           value="{{ old('isbn') }}"
                                           required>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Penulis</label>
                                            <input type="text"
                                                   class="form-control"
                                                   name="penulis"
                                                   value="{{ old('penulis') }}"
                                                   required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Stok</label>
                                            <input type="number"
                                                   class="form-control"
                                                   name="stok"
                                                   value="{{ old('stok') }}"
                                                   required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Harga</label>
                                            <div class="input-group">
                                                <span class="input-group-text">Rp</span>
                                                <input type="number"
                                                       class="form-control"
                                                       name="harga"
                                                       value="{{ old('harga') }}"
                                                       required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea class="form-control"
                                      name="deskripsi"
                                      rows="4">{{ old('deskripsi') }}</textarea>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.buku.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Simpan Buku
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function previewImage(event) {
        var input = event.target;
        var preview = document.getElementById('preview');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }

            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = '';
            preview.style.display = 'none';
        }
    }
</script>
@endsection
