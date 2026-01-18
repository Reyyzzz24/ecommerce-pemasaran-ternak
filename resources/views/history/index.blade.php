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
                        <a href="{{ url('home') }}" class="text-gray-600 hover:text-blue-600 font-medium transition-colors">
                            Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fa fa-chevron-right text-gray-400 text-xs mx-2"></i>
                            <span class="text-gray-400 font-medium">Riwayat Pemesanan</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>

        <div class="w-full px-2">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
                <div class="p-6">
                    <div class="flex items-center mb-6">
                        <div class="p-3 bg-blue-100 rounded-lg mr-4">
                            <i class="fa fa-history text-blue-600 text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800">Riwayat Pemesanan</h3>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead>
                                <tr class="bg-gray-50 text-gray-600 uppercase text-xs leading-normal">
                                    <th class="py-3 px-4 text-center">No</th>
                                    <th class="py-3 px-4">Tanggal</th>
                                    <th class="py-3 px-4 text-center">Status</th>
                                    <th class="py-3 px-4 text-right">Jumlah Harga</th>
                                    <th class="py-3 px-4 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700 text-sm">
                                @php $no = 1; @endphp
                                @foreach($pesanans as $pesanan)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="py-4 px-4 text-center">{{ $no++ }}</td>
                                    <td class="py-4 px-4">{{ $pesanan->tanggal }}</td>
                                    <td class="py-4 px-4 text-center">
                                        @if($pesanan->status == 1)
                                        <span class="bg-amber-100 text-amber-700 py-1 px-3 rounded-full text-xs font-bold">
                                            Belum dibayar
                                        </span>
                                        @else
                                        <span class="bg-green-100 text-green-700 py-1 px-3 rounded-full text-xs font-bold">
                                            Sudah dibayar
                                        </span>
                                        @endif
                                    </td>
                                    <td class="py-4 px-4 text-right font-semibold">
                                        Rp. {{ number_format($pesanan->jumlah_harga + $pesanan->kode) }}
                                    </td>
                                    <td class="py-4 px-4 text-center">
                                        <a href="{{ url('history') }}/{{ $pesanan->id }}"
                                            class="inline-flex items-center px-4 py-2 bg-blue-50 hover:bg-blue-600 text-blue-600 hover:text-white text-xs font-bold rounded-lg transition duration-300 border border-blue-100 hover:border-blue-600">
                                            <i class="fa fa-info-circle mr-2"></i> Detail
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    @if($pesanans->isEmpty())
                    <div class="text-center py-10">
                        <p class="text-gray-500 italic">Belum ada riwayat pemesanan.</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection