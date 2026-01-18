@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex flex-wrap -mx-2">
        <div class="w-full px-2 mb-4">
            <a href="{{ route('admin.barang.index') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition duration-300 shadow-md">
                <i class="fa fa-arrow-left mr-2"></i> Kembali
            </a>
        </div>

        <div class="w-full px-2 mb-6">
            <nav class="flex text-gray-700 bg-gray-50 py-3 px-5 rounded-lg border border-gray-200" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ url('home') }}" class="text-gray-600 hover:text-blue-600 font-medium transition-colors">Home</a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fa fa-chevron-right text-gray-400 text-xs mx-2"></i>
                            <a href="{{ route('admin.barang.index') }}" class="text-gray-600 hover:text-blue-600 font-medium transition-colors">Admin</a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fa fa-chevron-right text-gray-400 text-xs mx-2"></i>
                            <span class="text-gray-400 font-medium">Tambah Barang</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>

        <div class="w-full px-2">
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="p-6 border-b border-gray-100 bg-gray-50/50">
                    <h2 class="text-2xl font-bold text-gray-800">Tambah Barang Baru</h2>
                </div>

                <div class="p-8">
                    @if (session('success'))
                    <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded shadow-sm">
                        <div class="flex items-center">
                            <i class="fa fa-check-circle mr-2"></i>
                            <span>{{ session('success') }}</span>
                        </div>
                    </div>
                    @endif

                    <form id="createForm" action="{{ route('admin.barang.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="nama_barang" class="text-sm font-semibold text-gray-700 flex items-center">
                                    <i class="fa fa-tag mr-2 text-blue-500"></i> Nama Barang
                                </label>
                                <input type="text" id="nama_barang" name="nama_barang" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200"
                                    placeholder="Masukkan nama barang">
                            </div>

                            <div class="space-y-2">
                                <label for="harga" class="text-sm font-semibold text-gray-700 flex items-center">
                                    <i class="fa fa-money-bill mr-2 text-blue-500"></i> Harga (Rp)
                                </label>
                                <input type="number" id="harga" name="harga" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200"
                                    placeholder="Contoh: 50000">
                            </div>

                            <div class="space-y-2">
                                <label for="stok" class="text-sm font-semibold text-gray-700 flex items-center">
                                    <i class="fa fa-cubes mr-2 text-blue-500"></i> Stok Barang
                                </label>
                                <input type="number" id="stok" name="stok" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200"
                                    placeholder="Jumlah stok">
                            </div>

                            <div class="space-y-2">
                                <label for="gambar" class="text-sm font-semibold text-gray-700 flex items-center">
                                    <i class="fa fa-image mr-2 text-blue-500"></i> Gambar Produk
                                </label>
                                <input type="file" id="gambar" name="gambar" accept="image/*" required
                                    class="w-full px-3 py-1.5 border border-gray-300 rounded-lg bg-white file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer">
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label for="keterangan" class="text-sm font-semibold text-gray-700 flex items-center">
                                <i class="fa fa-align-left mr-2 text-blue-500"></i> Keterangan
                            </label>
                            <textarea id="keterangan" name="keterangan" rows="4" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200"
                                placeholder="Tuliskan deskripsi lengkap barang..."></textarea>
                        </div>

                        <div class="pt-4">
                            <button type="submit" id="submitBtn" 
                                class="w-full md:w-auto px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-lg shadow-lg hover:shadow-xl transition duration-300 flex items-center justify-center">
                                <i class="fa fa-save mr-2"></i> Tambah Barang
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('createForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    if (!this.checkValidity()) {
        this.reportValidity();
        return;
    }
    
    Swal.fire({
        title: 'Konfirmasi',
        text: 'Apakah Anda yakin ingin menambahkan barang ini?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3b82f6', // Tailwind blue-500
        cancelButtonColor: '#6b7280',  // Tailwind gray-500
        confirmButtonText: 'Ya, Tambahkan!',
        cancelButtonText: 'Batal',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            const submitBtn = document.getElementById('submitBtn');
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fa fa-spinner fa-spin mr-2"></i> Menyimpan...';
            
            Swal.fire({
                title: 'Menyimpan...',
                text: 'Mohon tunggu sebentar',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });
            
            this.submit();
        }
    });
});
</script>
@endsection