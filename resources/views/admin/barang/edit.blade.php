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

        <form action="{{ route('admin.barang.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
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

            <button type="submit" class="btn btn-success">Update Barang</button>
        </form>
    </div>
</div>
@endsection