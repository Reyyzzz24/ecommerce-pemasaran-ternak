@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <a href="{{ url('home') }}" class="btn btn-primary mb-2">
                <i class="fa fa-arrow-left"></i> Kembali
            </a>
        </div>
        <div class="col-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Check Out</li>
                </ol>
            </nav>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3><i class="fa fa-shopping-cart"></i> Check Out</h3>

                    @if(!empty($pesanan))
                        <p class="text-end">Tanggal Pesan : {{ $pesanan->tanggal }}</p>

                        <!-- Responsive table -->
                        <div class="table-responsive">
                            <table class="table table-striped align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Gambar</th>
                                        <th class="text-center">Nama Barang</th>
                                        <th class="text-center">Jumlah</th>
                                        <th class="text-center">Harga</th>
                                        <th class="text-center">Total Harga</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach($pesanan_details as $pesanan_detail)
                                    <tr>
                                        <td class="text-center">{{ $no++ }}</td>
                                        <td class="text-center">
                                            @if($pesanan_detail->barang)
                                                <img src="{{ url('uploads') }}/{{ $pesanan_detail->barang->gambar }}"
                                                    class="img-fluid rounded"
                                                    style="width: 80px; height: 80px; object-fit: cover; border: 1px solid #ddd; padding: 2px;"
                                                    alt="...">
                                            @else
                                                <span class="text-danger">Barang tidak ditemukan</span>
                                            @endif
                                        </td>
                                        <td class="text-center">{{ $pesanan_detail->barang ? $pesanan_detail->barang->nama_barang : '-' }}</td>
                                        <td class="text-center">{{ $pesanan_detail->jumlah }} ekor</td>
                                        <td class="text-end">{{ $pesanan_detail->barang ? 'Rp. ' . number_format($pesanan_detail->barang->harga) : '-' }}</td>
                                        <td class="text-end">Rp. {{ number_format($pesanan_detail->jumlah_harga) }}</td>
                                        <td class="text-center">
                                            <form action="{{ url('check-out') }}/{{ $pesanan_detail->id }}" method="post" class="d-inline">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger btn-sm mb-1" onclick="return confirm('Anda yakin akan menghapus data ?');">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="5" class="text-end"><strong>Total Harga :</strong></td>
                                        <td class="text-end"><strong>Rp. {{ number_format($pesanan->jumlah_harga) }}</strong></td>
                                        <td class="text-center">
                                            <a href="{{ url('konfirmasi-check-out') }}" class="btn btn-success w-100 w-md-auto" onclick="return confirm('Anda yakin akan Check Out ?');">
                                                <i class="fa fa-shopping-cart"></i> Check Out
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
