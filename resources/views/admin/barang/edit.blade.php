@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('admin.barang.index') }}" class="btn btn-primary">
                <i class="fa fa-arrow-left"></i> Kembali
            </a>
        </div>
        <h2 class="my-4">Edit Barang</h2>

        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <form id="editForm" action="{{ route('admin.barang.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{ $barang->nama_barang }}" required>
            </div>

            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label><br>

                {{-- Preview gambar lama --}}
                @if ($barang->gambar)
                <img src="{{ asset('uploads/'.$barang->gambar) }}"
                    alt="{{ $barang->nama_barang }}"
                    style="width:100px; height:100px; object-fit:cover; margin-bottom:10px; border:1px solid #ddd;">
                @endif

                {{-- Input file baru --}}
                <input type="file" class="form-control" id="gambar" name="gambar">
                <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar.</small>
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga" value="{{ $barang->harga }}" required>
            </div>

            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="number" class="form-control" id="stok" name="stok" value="{{ $barang->stok }}" required>
            </div>

            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea class="form-control" id="keterangan" name="keterangan" required>{{ $barang->keterangan }}</textarea>
            </div>

            <button type="submit" class="btn btn-success" id="submitBtn">
                <i class="fa fa-save"></i> Update Barang
            </button>
        </form>
    </div>
</div>

<script>
document.getElementById('editForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Validate form
    if (!this.checkValidity()) {
        this.reportValidity();
        return;
    }
    
    // Show confirmation dialog
    Swal.fire({
        title: 'Konfirmasi Update',
        text: 'Apakah Anda yakin ingin mengupdate barang ini?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#28a745',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Ya, Update!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            // Show loading state
            const submitBtn = document.getElementById('submitBtn');
            
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Mengupdate...';
            
            // Show loading alert
            Swal.fire({
                title: 'Mengupdate...',
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