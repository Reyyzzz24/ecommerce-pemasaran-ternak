@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('admin.barang.index') }}" class="btn btn-primary">
                <i class="fa fa-arrow-left"></i> Kembali
            </a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ url('home') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.barang.index') }}">Admin</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Tambah Barang
                    </li>
                </ol>

            </nav>
        </div>
        <h2 class="my-4">Tambah Barang Baru</h2>

        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        {{-- Form Tambah Barang --}}
        <form id="createForm" action="{{ route('admin.barang.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" required>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*" required>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga" required>
            </div>
            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="number" class="form-control" id="stok" name="stok" required>
            </div>
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea class="form-control" id="keterangan" name="keterangan" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary" id="submitBtn">
                <i class="fa fa-save"></i> Tambah Barang
            </button>
        </form>
    </div>
</div>

<script>
document.getElementById('createForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Validate form
    if (!this.checkValidity()) {
        this.reportValidity();
        return;
    }
    
    // Show confirmation dialog
    Swal.fire({
        title: 'Konfirmasi',
        text: 'Apakah Anda yakin ingin menambahkan barang ini?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Ya, Tambahkan!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            // Show loading state
            const submitBtn = document.getElementById('submitBtn');
            const originalText = submitBtn.innerHTML;
            
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Menyimpan...';
            
            // Show loading alert
            Swal.fire({
                title: 'Menyimpan...',
                text: 'Mohon tunggu sebentar',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });
            
            // Submit the form
            this.submit();
        }
    });
});
</script>
@endsection