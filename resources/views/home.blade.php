@extends('layouts.app')

@push('styles')
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
@endpush

@section('content')
    <!-- Hero Section -->
    <div class="hero d-flex justify-content-center align-items-center bg-light position-relative"
        style="background: url('{{ asset('images/banner_profile.jpeg') }}') no-repeat center center; background-size: cover; height: 500px; margin-top:-120px;">
        <!-- Vignette layer dengan z-index rendah -->
        <div class="position-absolute top-0 start-0 w-100 h-100"
            style="background: radial-gradient(ellipse at center, rgba(0,0,0,0.10) 0%, rgba(0,0,0,0.50) 100%); z-index:0;">
        </div>
        <div class="position-relative" style="z-index:2;">
            <h1 class="hero-title text-white text-center">Selamat Datang di Berkah Tani</h1>
            <p class="hero-subtitle text-white text-center">Sistem Informasi Penjualan Hewan Ternak</p>
        </div>
    </div>

    <!-- Produk Kami Section -->
    <section class="produk-section text-center py-5">
        <h2 class="produk-title">Produk Kami</h2>
        <p class="produk-subtitle">Temukan kebutuhan terbaik ternakmu di sini</p>

        <!-- Search Form -->
        <div class="produk-search mt-4 d-flex justify-content-center">
            <form class="d-flex w-100" style="max-width: 400px;" action="{{ url('search') }}" method="GET">
                <input class="form-control me-2" type="search" name="query" placeholder="Cari produk...">
                <button class="btn btn-outline-success" type="submit">Cari</button>
            </form>
        </div>
    </section>

    <!-- Produk List -->
    <div class="container mt-4">
        <div class="row justify-content-center">
            @foreach ($barangs as $barang)
                <div class="col-12 col-sm-6 col-md-4 mb-4">
                    <div class="card shadow-sm rounded-2">
                        <!-- Gambar Produk -->
                        <img src="{{ url('uploads') }}/{{ $barang->gambar }}" class="card-img-top rounded-top"
                            style="height:200px; object-fit:cover; aspect-ratio:19/6;" alt="{{ $barang->nama_barang }}">
                        <div class="card-body d-flex flex-column p-2">
                            <h5 class="card-title text-sm">{{ $barang->nama_barang }}</h5>
                            <p class="card-text text-sm mb-2">
                                <strong>Harga :</strong> Rp. {{ number_format($barang->harga) }} <br>
                                <strong>Stok :</strong> {{ $barang->stok }} <br>
                                <hr>
                                <strong>Keterangan :</strong> <br> {{ $barang->keterangan }}
                            </p>
                            <a href="{{ url('pesan') }}/{{ $barang->id }}" class="btn btn-primary text-xs mt-auto">
                                <i class="fa fa-shopping-cart"></i> Pesan
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Pagination -->
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <!-- Previous Button -->
            <li class="page-item {{ $barangs->onFirstPage() ? 'disabled' : '' }}">
                <section id="contact" class="py-5 bg-white mt-5">
            </li>

            <!-- Page Numbers -->
            @foreach ($barangs->getUrlRange(1, $barangs->lastPage()) as $page => $url)
                <li class="page-item {{ $barangs->currentPage() == $page ? 'active' : '' }}">
                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                </li>
            @endforeach

            <!-- Next Button -->
            <li class="page-item {{ $barangs->hasMorePages() ? '' : 'disabled' }}">
                <a class="page-link" href="{{ $barangs->nextPageUrl() }}">Next</a>
            </li>
        </ul>
    </nav>

    <!-- Contact -->
    <section id="contact" class="py-5 bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="row align-items-center">
                        <div class="col-md-6 mb-4 mb-md-0">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <h3 class="mb-4">Contact Us</h3>
                                    <form action="https://formspree.io/f/xrbgknkv" method="POST">
                                        <div class="mb-3">
                                            <input type="text" class="form-control" placeholder="Name" name="name">
                                        </div>
                                        <div class="mb-3">
                                            <input type="email" class="form-control" placeholder="Email" name="email">
                                        </div>
                                        <div class="mb-3">
                                            <textarea class="form-control" name="message" id="message" rows="5" placeholder="Message"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary w-100">Send Message</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-4 d-flex align-items-center ms-5 mt-3">
                                <span class="me-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M12 1c-3.148 0-6 2.553-6 5.702 0 3.148 2.602 6.907 6 12.298 3.398-5.391 6-9.15 6-12.298 0-3.149-2.851-5.702-6-5.702zm0 8c-1.105 0-2-.895-2-2s.895-2 2-2 2 .895 2 2-.895 2-2 2zm8 6h-3.135c-.385.641-.798 1.309-1.232 2h3.131l.5 1h-4.264l-.344.544-.289.456h.558l.858 2h-7.488l.858-2h.479l-.289-.456-.343-.544h-2.042l-1.011-1h2.42c-.435-.691-.848-1.359-1.232-2h-3.135l-4 8h24l-4-8zm-12.794 6h-3.97l1.764-3.528 1.516 1.528h1.549l-.859 2zm8.808-2h3.75l1 2h-3.892l-.858-2z" />
                                    </svg>
                                </span>
                                <div>
                                    <h5 class="mb-1">Address</h5>
                                    <p class="mb-0">Kp. Cijulang, RT 03/RW 07, Desa Sukaharja, Kecamatan Cijeruk,
                                        Kabupaten Bogor</p>
                                </div>
                            </div>
                            <div class="mb-4 d-flex align-items-center ms-5 mt-3">
                                <span class="me-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M5 3.461c0 .978.001 16.224 0 17.213-.002 2.214 3.508 3.326 7.014 3.326 3.495 0 6.986-1.105 6.986-3.326v-17.213c0-2.348-3.371-3.461-6.805-3.461-3.563 0-7.195 1.199-7.195 3.461zm7-1.461c.276 0 .5.223.5.5 0 .276-.224.5-.5.5s-.5-.224-.5-.5c0-.277.224-.5.5-.5zm0 20c-.552 0-1-.448-1-1 0-.553.448-1 1-1s1 .447 1 1c0 .552-.448 1-1 1zm5-3h-10v-15h10v15z" />
                                    </svg>
                                </span>
                                <div>
                                    <h5 class="mb-1">Phone</h5>
                                    <p class="mb-0">+6285697461625</p>
                                </div>
                            </div>
                            <div class="mb-4 d-flex align-items-center ms-5 mt-3">
                                <span class="me-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M0 3v18h24v-18h-24zm21.518 2l-9.518 7.713-9.518-7.713h19.036zm-19.518 14v-11.817l10 8.104 10-8.104v11.817h-20z" />
                                    </svg>
                                </span>
                                <div>
                                    <h5 class="mb-1">Email</h5>
                                    <p class="mb-0">adangpardiman33@gmail.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Contact -->

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-4 mt-5">
        <div class="footer-icons mb-3">
            <a href="https://www.facebook.com/adang.pardiman/" class="mx-2" target="_blank" rel="noopener">
                <i class="fa-brands fa-facebook" style="font-size: 1.25rem"></i>
    
            <a href="https://www.youtube.com/@adangpardiman44" class="mx-2" target="_blank" rel="noopener">
                <i class="fa-brands fa-youtube" style="font-size: 1.25rem;"></i>
            </a>
            <a href=https://www.tiktok.com/@user9061794311645" class="mx-2" target="_blank" rel="noopener">
                <i class="fa-brands fa-tiktok" style="font-size: 1.25rem;"></i>
            </a>
        </div>
        <p class="mb-0">&#169; 2025 ᴍᴀᴅᴇ ʙʏ ʀᴇᴠᴀ ʏᴜʟɪᴀɴ sᴀᴛʀɪᴀ</p>
    </footer>
    <!-- End of Footer -->
@endsection
