@extends('layouts.app')
@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex flex-wrap -mx-2">
        <div class="w-full px-2 mb-4">
            <a href="{{ url('history') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition duration-300 shadow-md">
                <i class="fa fa-arrow-left mr-2"></i> Kembali
            </a>
        </div>

        <div class="w-full px-2 mb-6">
            <nav class="flex text-gray-700 bg-gray-50 py-3 px-5 rounded-lg border border-gray-200" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ url('home') }}" class="text-gray-600 hover:text-blue-600 font-medium transition-colors">
                            Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fa fa-chevron-right text-gray-400 text-xs mx-2"></i>
                            <a href="{{ url('history') }}" class="text-gray-600 hover:text-blue-600 font-medium transition-colors">
                                Riwayat Pemesanan
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fa fa-chevron-right text-gray-400 text-xs mx-2"></i>
                            <span class="text-gray-400 font-medium">Detail Pemesanan</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>

        <div class="w-full px-2 mb-6">
            <div class="bg-green-50 border-l-4 border-green-500 rounded-xl shadow-sm overflow-hidden">
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-green-800 flex items-center">
                        <i class="fa fa-check-circle mr-2"></i> Sukses Check Out
                    </h3>
                    <div class="mt-4 text-gray-700 leading-relaxed">
                        <p>Pesanan anda sudah sukses dicheck out. Selanjutnya untuk pembayaran silahkan transfer ke rekening:</p>
                        <div class="mt-4 p-4 bg-white rounded-lg border border-green-100 inline-block">
                            <p class="text-lg"><strong>Bank BRI - 760401005344539</strong></p>
                            <p>a.n. <strong>Adang Pardiman</strong></p>
                            <p class="text-xl text-blue-600 mt-2">Nominal: <strong>Rp. {{ number_format($pesanan->kode + $pesanan->jumlah_harga) }}</strong></p>
                        </div>
                    </div>

                    @php
                    $nomor_wa = '6285697461625';
                    $pesan_wa = "Halo, saya ingin mengirim bukti transfer.\n\n" .
                    "Nomor Pesanan: " . $pesanan->id . "\n" .
                    "Total Transfer: Rp. " . number_format($pesanan->kode + $pesanan->jumlah_harga, 0, ',', '.') . "\n\n" .
                    "Berikut bukti transfer saya.";
                    $link_wa = "https://wa.me/{$nomor_wa}?text=" . urlencode($pesan_wa);
                    @endphp

                    <div class="mt-6">
                        <a href="{{ $link_wa }}" target="_blank"
                            class="inline-flex items-center justify-center w-full md:w-auto px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-bold rounded-lg transition duration-300 shadow-lg">
                            <i class="fab fa-whatsapp text-xl mr-2"></i> Kirim Bukti Transfer via WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full px-2">
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="p-6">
                    <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-6 pb-4">
                        <h3 class="text-xl font-bold text-gray-800 flex items-center">
                            <i class="fa fa-shopping-cart text-blue-500 mr-3"></i> Detail Pemesanan
                        </h3>
                        @if(!empty($pesanan))
                        <p class="text-gray-500 text-sm mt-2 md:mt-0">
                            <span class="font-medium">Tanggal Pesan:</span> {{ $pesanan->tanggal }}
                        </p>
                        @endif
                    </div>

                    @if(!empty($pesanan))
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-50 text-gray-600 uppercase text-xs leading-normal">
                                    <th class="py-3 px-4 text-center">No</th>
                                    <th class="py-3 px-4 text-center">Gambar</th>
                                    <th class="py-3 px-4">Nama Barang</th>
                                    <th class="py-3 px-4 text-center">Jumlah</th>
                                    <th class="py-3 px-4 text-right">Harga</th>
                                    <th class="py-3 px-4 text-right">Total Harga</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700 text-sm">
                                @php $no = 1; @endphp
                                @foreach($pesanan_details as $pesanan_detail)
                                <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                                    <td class="py-4 px-4 text-center">{{ $no++ }}</td>
                                    <td class="py-4 px-4 flex justify-center">
                                        <img src="{{ url('uploads') }}/{{ $pesanan_detail->barang->gambar }}"
                                            class="w-20 h-20 object-cover rounded-lg shadow-sm border border-gray-200"
                                            alt="{{ $pesanan_detail->barang->nama_barang }}">
                                    </td>
                                    <td class="py-4 px-4 font-medium">{{ $pesanan_detail->barang->nama_barang }}</td>
                                    <td class="py-4 px-4 text-center">
                                        <span class="bg-blue-100 text-blue-700 py-1 px-3 rounded-full text-xs font-bold">
                                            {{ $pesanan_detail->jumlah }} ekor
                                        </span>
                                    </td>
                                    <td class="py-4 px-4 text-right">Rp. {{ number_format($pesanan_detail->barang->harga) }}</td>
                                    <td class="py-4 px-4 text-right font-semibold">Rp. {{ number_format($pesanan_detail->jumlah_harga) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="text-gray-700">
                                    <td colspan="5" class="py-3 px-4 text-right font-medium">Total Harga :</td>
                                    <td class="py-3 px-4 text-right font-bold">Rp. {{ number_format($pesanan->jumlah_harga) }}</td>
                                </tr>
                                <tr class="text-gray-700">
                                    <td colspan="5" class="py-3 px-4 text-right font-medium">Kode Unik :</td>
                                    <td class="py-3 px-4 text-right text-red-500 font-bold">Rp. {{ number_format($pesanan->kode) }}</td>
                                </tr>
                                <tr class="bg-blue-50 text-blue-900">
                                    <td colspan="5" class="py-4 px-4 text-right font-bold text-lg">Total yang harus ditransfer :</td>
                                    <td class="py-4 px-4 text-right font-black text-lg">Rp. {{ number_format($pesanan->kode + $pesanan->jumlah_harga) }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection