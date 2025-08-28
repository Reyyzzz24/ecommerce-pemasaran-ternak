@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <a href="{{ url('history') }}" class="btn btn-primary mb-2">
                <i class="fa fa-arrow-left"></i> Kembali
            </a>
        </div>
        <div class="col-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('history') }}">Riwayat Pemesanan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Pemesanan</li>
                </ol>
            </nav>
        </div>

        <!-- Info Pembayaran -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3>Sukses Check Out</h3>
                    <p class="mt-2">
                        Pesanan anda sudah sukses dicheck out. Selanjutnya untuk pembayaran silahkan transfer ke rekening:
                        <br>
                        <strong>Bank BRI - 760401005344539</strong>
                        <br>
                        a.n. <strong>Adang Pardiman</strong>
                        <br>
                        Nominal: 
                        <strong>Rp. {{ number_format($pesanan->kode + $pesanan->jumlah_harga) }}</strong>
                    </p>
                    @php
                        $nomor_wa = '6285697461625';
                        $pesan_wa = "Halo, saya ingin mengirim bukti transfer.\n\n" .
                        "Nomor Pesanan: " . $pesanan->id . "\n" .
                        "Total Transfer: Rp. " . number_format($pesanan->kode + $pesanan->jumlah_harga, 0, ',', '.') . "\n\n" .
                        "Berikut bukti transfer saya.";
                        $link_wa = "https://wa.me/{$nomor_wa}?text=" . urlencode($pesan_wa);
                    @endphp

                    <a href="{{ $link_wa }}" target="_blank" 
                       class="btn btn-success w-100 w-md-auto mt-3">
                        <i class="bi bi-whatsapp"></i> Kirim Bukti Transfer via WhatsApp
                    </a>
                </div>
            </div>
        </div>

        <!-- Detail Pemesanan -->
        <div class="col-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <h3><i class="fa fa-shopping-cart"></i> Detail Pemesanan</h3>
                    @if(!empty($pesanan))
                        <p class="text-end">Tanggal Pesan : {{ $pesanan->tanggal }}</p>

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
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach($pesanan_details as $pesanan_detail)
                                        <tr>
                                            <td class="text-center">{{ $no++ }}</td>
                                            <td class="text-center">
                                                <img src="{{ url('uploads') }}/{{ $pesanan_detail->barang->gambar }}"
                                                    class="img-fluid rounded"
                                                    style="width: 80px; height: 80px; object-fit: cover; border: 1px solid #ddd; padding: 2px;"
                                                    alt="...">
                                            </td>
                                            <td class="text-center">{{ $pesanan_detail->barang->nama_barang }}</td>
                                            <td class="text-center">{{ $pesanan_detail->jumlah }} ekor</td>
                                            <td class="text-end">Rp. {{ number_format($pesanan_detail->barang->harga) }}</td>
                                            <td class="text-end">Rp. {{ number_format($pesanan_detail->jumlah_harga) }}</td>
                                        </tr>
                                    @endforeach

                                    <tr>
                                        <td colspan="5" class="text-end"><strong>Total Harga :</strong></td>
                                        <td class="text-end"><strong>Rp. {{ number_format($pesanan->jumlah_harga) }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="text-end"><strong>Kode Unik :</strong></td>
                                        <td class="text-end"><strong>Rp. {{ number_format($pesanan->kode) }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" class="text-end"><strong>Total yang harus ditransfer :</strong></td>
                                        <td class="text-end"><strong>Rp. {{ number_format($pesanan->kode + $pesanan->jumlah_harga) }}</strong></td>
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
