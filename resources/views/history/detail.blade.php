@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ url('history') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('history') }}">Riwayat Pemesanan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Pemesanan</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3>Sukses Check Out</h3>
                    <h5>Pesanan anda sudah sukses dicheck out selanjutnya untuk pembayaran silahkan transfer di rekening <strong>Bank BRI Nomer Rekening : 760401005344539 atas nama: Adang Pardiman</strong> dengan nominal : <strong>Rp. {{ number_format($pesanan->kode+$pesanan->jumlah_harga) }}</strong></h5>
                    @php
                    $nomor_wa = '6285697461625'; // Ganti 0 di depan jadi 62
                    $pesan_wa = "Halo, saya ingin mengirim bukti transfer.\n\n" .
                    "Nomor Pesanan: " . $pesanan->id . "\n" .
                    "Total Transfer: Rp. " . number_format($pesanan->kode + $pesanan->jumlah_harga, 0, ',', '.') . "\n\n" .
                    "Berikut bukti transfer saya.";
                    $link_wa = "https://wa.me/{$nomor_wa}?text=" . urlencode($pesan_wa);
                    @endphp

                    <a href="{{ $link_wa }}" target="_blank" class="btn btn-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                            <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232" />
                        </svg>
                         Kirim Bukti Transfer via WhatsApp
                    </a>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-body">
                    <h3><i class="fa fa-shopping-cart"></i> Detail Pemesanan</h3>
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
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach($pesanan_details as $pesanan_detail)
                            <tr>
                                <td class="text-center align-middle">{{ $no++ }}</td>
                                <td class="text-center align-middle">
                                    <div class="d-flex justify-content-center align-items-center h-100">
                                        <img src="{{ url('uploads') }}/{{ $pesanan_detail->barang->gambar }}"
                                            style="width: 100px; height: 100px; object-fit: cover; border: 1px solid #ddd; padding: 2px;"
                                            alt="...">
                                    </div>
                                </td>
                                <td class="align-middle text-center">{{ $pesanan_detail->barang->nama_barang }}</td>
                                <td class="align-middle text-center">{{ $pesanan_detail->jumlah }} ekor</td>
                                <td class="align-middle text-end">Rp. {{ number_format($pesanan_detail->barang->harga) }}</td>
                                <td class="align-middle text-end">Rp. {{ number_format($pesanan_detail->jumlah_harga) }}</td>
                            </tr>
                            @endforeach

                            <tr>
                                <td colspan="5" class="text-end align-middle"><strong>Total Harga :</strong></td>
                                <td class="text-end align-middle"><strong>Rp. {{ number_format($pesanan->jumlah_harga) }}</strong></td>
                            </tr>
                            <tr>
                                <td colspan="5" class="text-end align-middle"><strong>Kode Unik :</strong></td>
                                <td class="text-end align-middle"><strong>Rp. {{ number_format($pesanan->kode) }}</strong></td>
                            </tr>
                            <tr>
                                <td colspan="5" class="text-end align-middle"><strong>Total yang harus ditransfer :</strong></td>
                                <td class="text-end align-middle"><strong>Rp. {{ number_format($pesanan->kode+$pesanan->jumlah_harga) }}</strong></td>
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