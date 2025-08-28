@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <a href="{{ url('home') }}" class="btn btn-primary mb-2">
                <i class="fa fa-arrow-left"></i> Kembali
            </a>
        </div>
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Admin</li>
                </ol>
            </nav>
        </div>
        <div class="col-12">
            <h2 class="my-4">Daftar Barang</h2>

            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <a href="{{ route('admin.barang.create') }}" class="btn btn-success mb-3 w-100 w-md-auto">
                + Tambah Barang
            </a>

            <!-- Tambahkan table-responsive -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Gambar</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($barangs as $index => $barang)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $barang->nama_barang }}</td>
                            <td>
                                <img src="{{ url('uploads') }}/{{ $barang->gambar }}"
                                    class="rounded mx-auto d-block img-fluid"
                                    style="width: 80px; height: 80px; object-fit: cover; border: 1px solid #ddd; padding: 2px;"
                                    alt="">
                            </td>
                            <td>{{ number_format($barang->harga, 0, ',', '.') }}</td>
                            <td>{{ $barang->stok }}</td>
                            <td>{{ $barang->keterangan }}</td>
                            <td class="d-flex flex-wrap gap-1">
                                <a href="{{ route('admin.barang.edit', $barang->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $barang->id }}, '{{ $barang->nama_barang }}')">
                                    <i class="fa fa-trash"></i> Hapus
                                </button>
                                <form id="delete-form-{{ $barang->id }}" action="{{ route('admin.barang.destroy', $barang->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">Belum ada data barang</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
function confirmDelete(id, namaBarang) {
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: `Anda akan menghapus barang "${namaBarang}" secara permanen!`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            // Show loading state
            Swal.fire({
                title: 'Menghapus...',
                text: 'Mohon tunggu sebentar',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });
            
            // Submit the form
            document.getElementById(`delete-form-${id}`).submit();
        }
    });
}
</script>
@endsection
