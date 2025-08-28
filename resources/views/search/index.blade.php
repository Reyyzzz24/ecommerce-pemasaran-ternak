@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Hasil Pencarian untuk: "{{ $query }}"</h4>
    <hr>

    @if($barangs->count() > 0)
        <div class="row justify-content-center">
            @foreach($barangs as $barang)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ url('uploads') }}/{{ $barang->gambar }}" class="card-img-top" alt="{{ $barang->nama_barang }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $barang->nama_barang }}</h5>
                        <p class="card-text">
                            <strong>Harga :</strong> Rp. {{ number_format($barang->harga) }} <br>
                            <strong>Stok :</strong> {{ $barang->stok }} <br>
                            <hr>
                            <strong>Keterangan :</strong> <br>
                            {{ $barang->keterangan }}
                        </p>
                        <a href="{{ url('pesan') }}/{{ $barang->id }}" class="btn btn-primary">
                            <i class="fa fa-shopping-cart"></i> Pesan
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @else
        <p>Tidak ada produk ditemukan.</p>
    @endif
</div>
@endsection
