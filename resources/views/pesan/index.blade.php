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
                        <a href="{{ url('home') }}" class="text-gray-600 hover:text-blue-600 font-medium transition-colors">
                            Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fa fa-chevron-right text-gray-400 text-xs mx-2"></i>
                            <span class="text-gray-400 font-medium" aria-current="page">
                                {{ $barang->nama_barang }}
                            </span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>

        <div class="w-full px-4">
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
                <div class="p-6 md:p-10">
                    <div class="flex flex-wrap -mx-4">
                        <div class="w-full md:w-1/2 px-4 mb-8 md:mb-0">
                            <div class="relative group">
                                <img src="{{ url('uploads') }}/{{ $barang->gambar }}"
                                    class="w-full h-auto rounded-xl shadow-lg transform group-hover:scale-[1.02] transition duration-500 object-cover"
                                    alt="{{ $barang->nama_barang }}">
                            </div>
                        </div>

                        <div class="w-full md:w-1/2 px-4">
                            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-800 mb-6">{{ $barang->nama_barang }}</h2>

                            <div class="overflow-hidden mb-8">
                                <table class="w-full text-left">
                                    <tbody class="divide-y divide-gray-100">
                                        <tr>
                                            <td class="py-3 text-gray-500 font-medium w-1/3">Harga</td>
                                            <td class="py-3 text-gray-800 font-bold text-xl text-green-600">: Rp. {{ number_format($barang->harga) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 text-gray-500 font-medium">Stok</td>
                                            <td class="py-3 text-gray-800">: {{ number_format($barang->stok) }} ekor</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 text-gray-500 font-medium">Keterangan</td>
                                            <td class="py-3 text-gray-600 leading-relaxed">: {{ $barang->keterangan }}</td>
                                        </tr>
                                        <tr>
                                            <td class="py-3 text-gray-500 font-medium align-top">Jumlah Pesan</td>
                                            <td class="py-3">
                                                <form id="orderForm" method="post" action="{{ url('pesan') }}/{{ $barang->id }}" class="flex flex-col space-y-3">
                                                    @csrf
                                                    <div class="relative max-w-[200px]">
                                                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                                            <i class="fa fa-calculator"></i>
                                                        </span>
                                                        <input type="number" name="jumlah_pesan"
                                                            class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none transition"
                                                            placeholder="0" required min="1">
                                                    </div>

                                                    <button type="submit" id="orderBtn"
                                                        class="inline-flex items-center justify-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-bold rounded-lg transition duration-300 shadow-lg group">
                                                        <i class="fa fa-shopping-cart mr-2 group-hover:animate-bounce"></i>
                                                        Masukkan Keranjang
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const orderForm = document.getElementById('orderForm');

        if (orderForm) {
            orderForm.addEventListener('submit', function(e) {
                e.preventDefault();

                const inputJumlah = document.querySelector('input[name="jumlah_pesan"]');
                const jumlahPesan = parseInt(inputJumlah.value);

                // Perbaikan: Bungkus dengan kutip agar VS Code tidak error
                const stokTersedia = parseInt("{{ $barang->stok }}");
                const namaBarang = "{{ $barang->nama_barang }}";
                const hargaBarang = parseInt("{{ $barang->harga }}");

                // Validasi Stok
                if (jumlahPesan > stokTersedia) {
                    Swal.fire({
                        title: 'Stok Tidak Cukup!',
                        text: `Stok tersedia hanya ${stokTersedia} ekor, sedangkan Anda memesan ${jumlahPesan} ekor.`,
                        icon: 'warning',
                        confirmButtonColor: '#ef4444',
                    });
                    return;
                }

                if (jumlahPesan <= 0 || isNaN(jumlahPesan)) {
                    Swal.fire({
                        title: 'Jumlah Tidak Valid',
                        text: 'Silakan masukkan jumlah pesanan minimal 1.',
                        icon: 'error',
                        confirmButtonColor: '#ef4444',
                    });
                    return;
                }

                // Konfirmasi
                const total = (jumlahPesan * hargaBarang).toLocaleString('id-ID');
                Swal.fire({
                    title: 'Konfirmasi Pesanan',
                    html: `Anda akan memesan <b>${jumlahPesan} ekor ${namaBarang}</b><br>Total Harga: <span class="text-green-600 font-bold text-xl">Rp. ${total}</span>`,
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#10b981',
                    cancelButtonColor: '#6b7280',
                    confirmButtonText: 'Ya, Masukkan Keranjang!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        const orderBtn = document.getElementById('orderBtn');
                        orderBtn.disabled = true;
                        orderBtn.classList.add('opacity-50', 'cursor-not-allowed');
                        orderBtn.innerHTML = '<i class="fa fa-spinner fa-spin mr-2"></i> Memproses...';

                        Swal.fire({
                            title: 'Memproses...',
                            allowOutsideClick: false,
                            didOpen: () => {
                                Swal.showLoading();
                            }
                        });

                        // Gunakan submit() dari elemen form asli
                        orderForm.submit();
                    }
                });
            });
        }
    });
</script>