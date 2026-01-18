@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex flex-wrap -mx-2">
        <div class="w-full px-2 mb-4">
            <a href="{{ url('home') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition duration-300 shadow-md">
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
                            <span class="text-gray-400 font-medium">Admin</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>

        <div class="w-full px-2">
            <h2 class="text-3xl font-bold text-gray-800 mb-6">Daftar Barang</h2>

            @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded shadow-sm">
                <div class="flex items-center">
                    <i class="fa fa-check-circle mr-2"></i>
                    <span>{{ session('success') }}</span>
                </div>
            </div>
            @endif

            <div class="mb-6">
                <a href="{{ route('admin.barang.create') }}" class="inline-flex items-center px-5 py-2.5 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg transition duration-300 shadow-md">
                    <i class="fa fa-plus mr-2"></i> Tambah Barang
                </a>
            </div>

            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 text-gray-600 uppercase text-xs font-bold transition-colors">
                                <th class="py-4 px-6 text-center">No</th>
                                <th class="py-4 px-6">Nama Barang</th>
                                <th class="py-4 px-6 text-center">Gambar</th>
                                <th class="py-4 px-6">Harga</th>
                                <th class="py-4 px-6 text-center">Stok</th>
                                <th class="py-4 px-6">Keterangan</th>
                                <th class="py-4 px-6 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700 text-sm divide-y divide-gray-100">
                            @forelse ($barangs as $index => $barang)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="py-4 px-6 text-center font-medium">{{ $index + 1 }}</td>
                                <td class="py-4 px-6 font-semibold text-gray-900">{{ $barang->nama_barang }}</td>
                                <td class="py-4 px-6">
                                    <div class="flex justify-center">
                                        <img src="{{ url('uploads') }}/{{ $barang->gambar }}"
                                            class="rounded-lg shadow-sm border border-gray-200 object-cover w-20 h-20 p-1 bg-white"
                                            alt="{{ $barang->nama_barang }}">
                                    </div>
                                </td>
                                <td class="py-4 px-6 text-blue-600 font-bold">
                                    Rp {{ number_format($barang->harga, 0, ',', '.') }}
                                </td>
                                <td class="py-4 px-6 text-center">
                                    <span class="px-3 py-1 bg-gray-100 text-gray-800 rounded-full font-semibold">
                                        {{ $barang->stok }}
                                    </span>
                                </td>
                                <td class="py-4 px-6 text-gray-500 italic max-w-xs truncate">
                                    {{ $barang->keterangan }}
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex justify-center gap-2">
                                        <a href="{{ route('admin.barang.edit', $barang->id) }}" class="inline-flex items-center px-3 py-1.5 bg-amber-400 hover:bg-amber-500 text-white text-xs font-bold rounded-md transition duration-300">
                                            <i class="fa fa-edit mr-1"></i> Edit
                                        </a>
                                        <button type="button" class="inline-flex items-center px-3 py-1.5 bg-red-500 hover:bg-red-600 text-white text-xs font-bold rounded-md transition duration-300" 
                                            onclick="confirmDelete('{{ $barang->id }}', '{{ $barang->nama_barang }}')">
                                            <i class="fa fa-trash mr-1"></i> Hapus
                                        </button>
                                        <form id="delete-form-{{ $barang->id }}" action="{{ route('admin.barang.destroy', $barang->id) }}" method="POST" class="hidden">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="py-12 text-center text-gray-500 italic">
                                    Belum ada data barang.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
/**
 * Fungsi hapus dengan SweetAlert
 */
function confirmDelete(id, namaBarang) {
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: "Anda akan menghapus barang " + namaBarang + " secara permanen!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#ef4444',
        cancelButtonColor: '#3b82f6',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Menghapus...',
                text: 'Mohon tunggu sebentar',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });
            // Melakukan submit form berdasarkan ID
            var formId = 'delete-form-' + id;
            document.getElementById(formId).submit();
        }
    });
}
</script>
@endsection