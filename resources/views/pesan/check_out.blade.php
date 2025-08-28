@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ url('home') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Check Out</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3><i class="fa fa-shopping-cart"></i> Check Out</h3>
                    @if(!empty($pesanan))
                    <p align="right">Tanggal Pesan : {{ $pesanan->tanggal }}</p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center align-middle">No</th>
                                <th class="text-center align-middle">Gambar</th>
                                <th class="text-center align-middle">Nama Barang</th>
                                <th class="text-center align-middle">Jumlah</th>
                                <th class="text-center align-middle">Harga</th>
                                <th class="text-center align-middle">Total Harga</th>
                                <th class="text-center align-middle">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach($pesanan_details as $pesanan_detail)
                            <tr>
                                <td class="text-center align-middle">{{ $no++ }}</td>
                                <td class="text-center align-middle">
                                    @if($pesanan_detail->barang)
                                        <div class="d-flex justify-content-center align-items-center h-100">
                                            <img src="{{ url('uploads') }}/{{ $pesanan_detail->barang->gambar }}"
                                                style="width: 100px; height: 100px; object-fit: cover; border: 1px solid #ddd; padding: 2px;"
                                                alt="...">
                                        </div>
                                    @else
                                        <span class="text-danger">Barang tidak ditemukan</span>
                                    @endif
                                </td>
                                <td class="align-middle text-center">{{ $pesanan_detail->barang ? $pesanan_detail->barang->nama_barang : '-' }}</td>
                                <td class="align-middle text-center">{{ $pesanan_detail->jumlah }} ekor</td>
                                <td class="align-middle text-end">{{ $pesanan_detail->barang ? 'Rp. ' . number_format($pesanan_detail->barang->harga) : '-' }}</td>
                                <td class="align-middle text-end">Rp. {{ number_format($pesanan_detail->jumlah_harga) }}</td>
                                <td class="align-middle text-center">
                                    <form action="{{ url('check-out') }}/{{ $pesanan_detail->id }}" method="post">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan menghapus data ?');"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="5" align="right"><strong>Total Harga :</strong></td>
                                <td align="right"><strong>Rp. {{ number_format($pesanan->jumlah_harga) }}</strong></td>
                                <td>
                                    <a href="{{ url('konfirmasi-check-out') }}" class="btn btn-success" onclick="return confirm('Anda yakin akan Check Out ?');">
                                        <i class="fa fa-shopping-cart"></i> Check Out
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>
@endsection