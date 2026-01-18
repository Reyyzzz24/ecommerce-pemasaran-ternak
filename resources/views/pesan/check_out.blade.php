@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex flex-wrap -mx-4">
        <div class="w-full px-4 mb-4">
            <a href="{{ url('home') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition duration-300 shadow-md">
                <i class="fa fa-arrow-left mr-2"></i> Kembali
            </a>
        </div>

        <div class="w-full px-4 mb-6">
            <nav class="flex text-gray-700 bg-gray-50 py-3 px-5 rounded-lg border border-gray-200" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ url('home') }}" class="text-gray-600 hover:text-blue-600 font-medium">Home</a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fa fa-chevron-right text-gray-400 text-xs mx-2"></i>
                            <span class="text-gray-400 font-medium">Check Out</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>

        <div class="w-full px-4">
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                        <i class="fa fa-shopping-cart text-blue-600 mr-3"></i> Check Out
                    </h3>

                    @if (!empty($pesanan))
                    <div class="flex justify-between items-center mb-4">
                        <p class="text-sm text-gray-500 italic">Pastikan pesanan Anda sudah benar</p>
                        <p class="text-gray-800 font-semibold bg-blue-50 px-3 py-1 rounded-full text-sm">
                            Tanggal Pesan : {{ $pesanan->tanggal }}
                        </p>
                    </div>

                    <div class="overflow-hidden rounded-2xl border border-gray-200 shadow-sm bg-white">
                        <table class="w-full text-sm text-left">
                            <thead class="text-xs text-gray-600 uppercase bg-gray-50/50 border-b border-gray-200">
                                <tr>
                                    <th class="px-6 py-4 text-center font-bold">No</th>
                                    <th class="px-6 py-4 font-bold">Produk</th>
                                    <th class="px-6 py-4 text-center font-bold">Jumlah</th>
                                    <th class="px-6 py-4 text-right font-bold">Harga Satuan</th>
                                    <th class="px-6 py-4 text-right font-bold">Subtotal</th>
                                    <th class="px-6 py-4 text-center font-bold">Aksi</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-100">
                                @php $no = 1; @endphp
                                @foreach ($pesanan_details as $pesanan_detail)
                                <tr class="group hover:bg-blue-50/30 transition duration-200">
                                    <td class="px-6 py-4 text-center font-medium text-gray-500">
                                        {{ $no++ }}
                                    </td>

                                    <td class="px-6 py-4">
                                        <div class="flex items-center space-x-4">
                                            <div class="flex-shrink-0">
                                                @if ($pesanan_detail->barang)
                                                <img src="{{ url('uploads') }}/{{ $pesanan_detail->barang->gambar }}"
                                                    class="w-14 h-14 object-cover rounded-xl shadow-sm group-hover:scale-105 transition duration-300 border border-gray-100"
                                                    alt="{{ $pesanan_detail->barang->nama_barang }}">
                                                @else
                                                <div class="w-14 h-14 bg-gray-100 rounded-xl flex items-center justify-center">
                                                    <i class="fa fa-image text-gray-400"></i>
                                                </div>
                                                @endif
                                            </div>
                                            <div>
                                                <div class="text-sm font-bold text-gray-900 leading-none mb-1">
                                                    {{ $pesanan_detail->barang ? $pesanan_detail->barang->nama_barang : '-' }}
                                                </div>
                                                <span class="text-xs text-gray-500 bg-gray-100 px-2 py-0.5 rounded text-[10px] uppercase tracking-wide">Ternak</span>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 text-center">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            {{ $pesanan_detail->jumlah }} ekor
                                        </span>
                                    </td>

                                    <td class="px-6 py-4 text-right text-gray-600 font-medium">
                                        {{ $pesanan_detail->barang ? 'Rp ' . number_format($pesanan_detail->barang->harga) : '-' }}
                                    </td>

                                    <td class="px-6 py-4 text-right">
                                        <span class="text-sm font-bold text-gray-900">
                                            Rp {{ number_format($pesanan_detail->jumlah_harga) }}
                                        </span>
                                    </td>

                                    <td class="px-6 py-4 text-center">
                                        <button type="button"
                                            class="inline-flex items-center justify-center w-9 h-9 bg-red-50 text-red-500 hover:bg-red-500 hover:text-white rounded-xl transition-all duration-300 btn-delete shadow-sm"
                                            data-id="{{ $pesanan_detail->id }}"
                                            data-nama="{{ $pesanan_detail->barang ? $pesanan_detail->barang->nama_barang : 'Barang' }}">
                                            <i class="fa fa-trash-can text-sm"></i>
                                        </button>

                                        <form id="delete-form-{{ $pesanan_detail->id }}"
                                            action="{{ url('check-out') }}/{{ $pesanan_detail->id }}"
                                            method="post" class="hidden">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                            <tfoot>
                                <tr class="bg-gray-50/80">
                                    <td colspan="4" class="px-6 py-6 text-right font-bold text-gray-700 text-base uppercase tracking-wider">
                                        Total Pembayaran
                                    </td>
                                    <td class="px-6 py-6 text-right">
                                        <span class="text-2xl font-black text-green-600">
                                            Rp {{ number_format($pesanan->jumlah_harga) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-6 text-center">
                                        <button type="button"
                                            class="inline-flex items-center px-6 py-3 bg-green-500 hover:bg-green-600 text-white font-bold rounded-xl shadow-md hover:shadow-green-200 transition-all duration-300 transform hover:-translate-y-1"
                                            onclick="confirmCheckout()">
                                            <i class="fa fa-cart-check mr-2"></i> Checkout
                                        </button>
                                    </td>
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.btn-delete');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const namaBarang = this.getAttribute('data-nama');
                confirmDeleteItem(id, namaBarang);
            });
        });
    });

    // FUNGSI UNTUK HAPUS ITEM
    function confirmDeleteItem(id, namaBarang) {
        Swal.fire({
            title: 'Hapus Item?',
            text: "Anda yakin akan menghapus " + namaBarang + " dari keranjang?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }

    // FUNGSI UNTUK CHECKOUT (Tambahkan ini agar tombol berfungsi)
    function confirmCheckout() {
        Swal.fire({
            title: 'Konfirmasi Pesanan?',
            text: "Pastikan semua item sudah sesuai sebelum memproses pembayaran.",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#10b981', // warna hijau
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Ya, Check Out Sekarang!',
            cancelButtonText: 'Kembali',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Memproses...',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });
                // Arahkan ke route konfirmasi checkout
                window.location.href = "{{ url('konfirmasi-check-out') }}";
            }
        });
    }
</script>