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
                <li class="breadcrumb-item active" aria-current="page">{{ $barang->nama_barang }}</li>
              </ol>
            </nav>
        </div>
        <div class="col-md-12 mt-1">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ url('uploads') }}/{{ $barang->gambar }}" class="rounded mx-auto d-block" width="100%" alt=""> 
                        </div>
                        <div class="col-md-6 mt-5">
                            <h2>{{ $barang->nama_barang }}</h2>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Harga</td>
                                        <td>:</td>
                                        <td>Rp. {{ number_format($barang->harga) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Stok</td>
                                        <td>:</td>
                                        <td>{{ number_format($barang->stok) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Keterangan</td>
                                        <td>:</td>
                                        <td>{{ $barang->keterangan }}</td>
                                    </tr>
                                   
                                    <tr>
                                        <td>Jumlah Pesan</td>
                                        <td>:</td>
                                        <td>
                                             <form id="orderForm" method="post" action="{{ url('pesan') }}/{{ $barang->id }}" >
                                            @csrf
                                                <input type="text" name="jumlah_pesan" class="form-control" required="">
                                                <button type="submit" class="btn btn-primary mt-2" id="orderBtn">
                                                    <i class="fa fa-shopping-cart"></i> Masukkan Keranjang
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
@endsection

<script>
document.getElementById('orderForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Validate form
    if (!this.checkValidity()) {
        this.reportValidity();
        return;
    }
    
    const jumlahPesan = document.querySelector('input[name="jumlah_pesan"]').value;
    const stokTersedia = {{ $barang->stok }};
    
    // Check if order quantity exceeds available stock
    if (parseInt(jumlahPesan) > stokTersedia) {
        Swal.fire({
            title: 'Stok Tidak Cukup!',
            text: `Stok tersedia hanya ${stokTersedia} ekor, sedangkan Anda memesan ${jumlahPesan} ekor.`,
            icon: 'warning',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        });
        return;
    }
    
    // Show confirmation dialog
    Swal.fire({
        title: 'Konfirmasi Pesanan',
        text: `Anda akan memesan ${jumlahPesan} ekor ${$barang->nama_barang} dengan total harga Rp. ${(jumlahPesan * {{ $barang->harga }}).toLocaleString('id-ID')}`,
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Ya, Pesan Sekarang!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            // Show loading state
            const orderBtn = document.getElementById('orderBtn');
            
            orderBtn.disabled = true;
            orderBtn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Memproses...';
            
            // Show loading alert
            Swal.fire({
                title: 'Memproses Pesanan...',
                text: 'Mohon tunggu sebentar',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });
            
            // Submit the form
            this.submit();
        }
    });
});
</script>