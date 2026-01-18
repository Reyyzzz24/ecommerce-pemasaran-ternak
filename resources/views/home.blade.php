@extends('layouts.app')

<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

<section id="hero" class="relative">
    <div class="relative flex items-center justify-center bg-gray-900 overflow-hidden h-[500px] md:h-[800px] -mt-[120px] mt-0 pb-16">

        <img src="{{ asset('images/banner_profile.jpeg') }}"
            alt="Banner Berkah Tani"
            class="absolute inset-0 w-full h-full object-cover scale-105 animate-slow-zoom blur-[2px]">

        <div class="absolute inset-0 bg-gradient-to-b from-black/70 via-black/40 to-gray-900 z-10"></div>
        <div class="absolute inset-0 bg-green-900/10 z-15"></div>

        <div class="relative z-20 text-center text-white px-4 max-w-5xl mx-auto mt-32 md:mt-20">
            <span class="inline-block px-4 py-1.5 mb-4 md:mb-6 text-[10px] md:text-xs font-bold tracking-widest uppercase bg-green-600 rounded-full animate-fade-in-down">
                Peternakan Modern & Terpercaya
            </span>

            <h1 class="text-3xl md:text-7xl font-black mb-4 md:mb-6 drop-shadow-2xl tracking-tighter leading-tight animate-fade-in-up">
                Solusi Cerdas <br> <span class="text-green-500">Kebutuhan Ternak</span> Anda
            </h1>

            <p class="text-sm md:text-xl opacity-90 drop-shadow-lg max-w-2xl mx-auto leading-relaxed mb-8 md:mb-10 animate-fade-in-up-delay">
                Menyediakan hewan ternak berkualitas tinggi dengan sistem transaksi yang aman, mudah, dan transparan untuk kemajuan bisnis peternakan Anda.
            </p>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 animate-fade-in-up-long">
                <a href="#product" class="group relative bg-green-600 hover:bg-green-500 text-white px-6 py-3 md:px-10 md:py-4 rounded-xl font-bold transition-all duration-300 shadow-[0_0_20px_rgba(34,197,94,0.3)] hover:shadow-[0_0_30px_rgba(34,197,94,0.5)] overflow-hidden text-sm md:text-base">
                    <span class="relative z-10 flex items-center">
                        Mulai Belanja <i class="fa fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                    </span>
                </a>

                <a href="#tentang" class="bg-white/10 hover:bg-white/20 backdrop-blur-md text-white border border-white/30 px-6 py-3 md:px-10 md:py-4 rounded-xl font-bold transition-all duration-300 text-sm md:text-base">
                    Tentang Kami
                </a>
            </div>
        </div>

        <div class="hidden md:block absolute bottom-10 left-1/2 -translate-x-1/2 z-20 animate-bounce opacity-70">
            <div class="w-6 h-10 border-2 border-white rounded-full flex justify-center p-1">
                <div class="w-1 h-2 bg-white rounded-full"></div>
            </div>
        </div>
    </div>
</section>

<style>
    @keyframes slow-zoom {
        0% {
            transform: scale(1);
        }

        100% {
            transform: scale(1.1);
        }
    }

    .animate-slow-zoom {
        animation: slow-zoom 20s linear infinite alternate;
    }

    .animate-fade-in-up {
        animation: fadeInUp 0.8s ease-out forwards;
    }

    .animate-fade-in-up-delay {
        animation: fadeInUp 0.8s ease-out 0.3s forwards;
        opacity: 0;
    }

    .animate-fade-in-up-long {
        animation: fadeInUp 0.8s ease-out 0.6s forwards;
        opacity: 0;
    }

    .animate-fade-in-down {
        animation: fadeInDown 0.8s ease-out forwards;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
<section id="product"
    class="py-12 text-center bg-white">
    <h2 class="text-3xl font-bold text-gray-800">Produk Kami</h2>
    <p class="text-gray-600 mt-2">Temukan kebutuhan terbaik ternakmu di sini</p>

    <div class="mt-8 flex justify-center px-4">
        <form class="flex w-full max-w-md gap-2" action="{{ url('search') }}" method="GET">
            <input class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:outline-none"
                type="search" name="query" placeholder="Cari produk...">
            <button class="px-6 py-2 bg-transparent border border-green-600 text-green-600 font-semibold rounded-lg hover:bg-green-600 hover:text-white transition duration-300"
                type="submit">Cari</button>
        </form>
    </div>
</section>

<section>
    <div class="container mx-auto px-4 mt-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 justify-items-center">
            @foreach ($barangs as $barang)
            <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 w-full max-w-sm">
                <img src="{{ url('uploads') }}/{{ $barang->gambar }}"
                    class="w-full h-52 object-cover"
                    alt="{{ $barang->nama_barang }}">

                <div class="p-5 flex flex-col h-full">
                    <h5 class="text-lg font-bold text-gray-800 mb-2">{{ $barang->nama_barang }}</h5>
                    <div class="text-sm text-gray-600 space-y-1 mb-4">
                        <p><span class="font-semibold text-gray-800">Harga:</span> Rp. {{ number_format($barang->harga) }}</p>
                        <p><span class="font-semibold text-gray-800">Stok:</span> {{ $barang->stok }}</p>
                        <hr class="my-2 border-gray-100">
                        <p><span class="font-semibold text-gray-800">Keterangan:</span><br> {{ $barang->keterangan }}</p>
                    </div>
                    <a href="{{ url('pesan') }}/{{ $barang->id }}"
                        class="block text-center bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition duration-300 text-sm font-semibold">
                        <i class="fa fa-shopping-cart mr-2"></i> Pesan
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<nav class="flex justify-center my-12" aria-label="Page navigation">
    <ul class="flex items-center space-x-2">
        {{-- Tombol prev, numbers, dan next di sini sebaiknya menggunakan default Tailwind pagination Laravel --}}
        {{-- Contoh manual sederhana: --}}
        @foreach ($barangs->getUrlRange(1, $barangs->lastPage()) as $page => $url)
        <li>
            <a href="{{ $url }}"
                class="px-4 py-2 rounded-md {{ $barangs->currentPage() == $page ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
                {{ $page }}
            </a>
        </li>
        @endforeach
    </ul>
</nav>

<section id="tentang" class="py-20 bg-white overflow-hidden">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap items-center -mx-4">
            <div class="w-full lg:w-1/2 px-4 mb-12 lg:mb-0 relative">
                <div class="relative z-10 rounded-2xl overflow-hidden shadow-2xl transform -rotate-2 hover:rotate-0 transition duration-500">
                    <img src="{{ asset('images/banner_profile1.png') }}" alt="Tentang Berkah Tani" class="w-full h-[400px] object-cover">
                </div>
                <div class="absolute -bottom-6 -right-2 w-32 h-32 bg-green-100 rounded-full -z-0 opacity-50"></div>
                <div class="absolute -top-6 -left-2 w-24 h-24 bg-green-600/10 rounded-lg -z-0"></div>
            </div>

            <div class="w-full lg:w-1/2 px-4 lg:pl-16">
                <div class="inline-block px-4 py-1 mb-4 text-sm font-semibold text-green-700 bg-green-50 rounded-full">
                    Mengenal Lebih Dekat
                </div>
                <h2 class="text-4xl font-black text-gray-900 mb-6 leading-tight">
                    Dedikasi Berkah Tani untuk <br>
                    <span class="text-green-600">Peternakan Indonesia</span>
                </h2>
                <p class="text-gray-600 text-lg leading-relaxed mb-6">
                    <strong>Berkah Tani</strong> adalah mitra terpercaya bagi para peternak dan masyarakat dalam penyediaan hewan ternak berkualitas unggul. Berawal dari kepedulian terhadap standar kelayakan hewan, kami hadir untuk menjembatani transaksi yang transparan dan aman.
                </p>

                <div class="space-y-4 mb-8">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-6 h-6 bg-green-500 rounded-full flex items-center justify-center mt-1">
                            <i class="fas fa-check text-white text-xs"></i>
                        </div>
                        <p class="ml-4 text-gray-700 font-medium">Hewan ternak melalui proses seleksi kesehatan yang ketat.</p>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-6 h-6 bg-green-500 rounded-full flex items-center justify-center mt-1">
                            <i class="fas fa-check text-white text-xs"></i>
                        </div>
                        <p class="ml-4 text-gray-700 font-medium">Harga kompetitif dengan sistem pembayaran yang mudah.</p>
                    </div>
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-6 h-6 bg-green-500 rounded-full flex items-center justify-center mt-1">
                            <i class="fas fa-check text-white text-xs"></i>
                        </div>
                        <p class="ml-4 text-gray-700 font-medium">Pengiriman profesional yang menjamin kesejahteraan hewan.</p>
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-4 pt-6 border-t border-gray-100">
                    <div>
                        <p class="text-2xl font-bold text-gray-900">100%</p>
                        <p class="text-xs text-gray-500 uppercase tracking-wide font-semibold">Sehat & Layak</p>
                    </div>
                    <div>
                        <p class="text-2xl font-bold text-gray-900">1k+</p>
                        <p class="text-xs text-gray-500 uppercase tracking-wide font-semibold">Pelanggan Puas</p>
                    </div>
                    <div>
                        <p class="text-2xl font-bold text-gray-900">24/7</p>
                        <p class="text-xs text-gray-500 uppercase tracking-wide font-semibold">Layanan Support</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="contact" class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 max-w-5xl">
        <div class="flex flex-wrap -mx-4 items-center">
            <div class="w-full md:w-1/2 px-4 mb-8 md:mb-0">
                <div class="bg-white p-8 rounded-2xl shadow-sm">
                    <h3 class="text-2xl font-bold mb-6 text-gray-800">Contact Us</h3>
                    <form action="https://formspree.io/f/xrbgknkv" method="POST" class="space-y-4">
                        <input type="text" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none" placeholder="Name" name="name">
                        <input type="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none" placeholder="Email" name="email">
                        <textarea class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none" name="message" rows="5" placeholder="Message"></textarea>
                        <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg font-bold hover:bg-blue-700 transition duration-300">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>

            <div class="w-full md:w-1/2 px-4 md:pl-12 space-y-8">
                <div class="flex items-start space-x-4">
                    <div class="text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 1c-3.148 0-6 2.553-6 5.702 0 3.148 2.602 6.907 6 12.298 3.398-5.391 6-9.15 6-12.298 0-3.149-2.851-5.702-6-5.702zm0 8c-1.105 0-2-.895-2-2s.895-2 2-2 2 .895 2 2-.895 2-2 2zm8 6h-3.135c-.385.641-.798 1.309-1.232 2h3.131l.5 1h-4.264l-.344.544-.289.456h.558l.858 2h-7.488l.858-2h.479l-.289-.456-.343-.544h-2.042l-1.011-1h2.42c-.435-.691-.848-1.359-1.232-2h-3.135l-4 8h24l-4-8zm-12.794 6h-3.97l1.764-3.528 1.516 1.528h1.549l-.859 2zm8.808-2h3.75l1 2h-3.892l-.858-2z" />
                        </svg>
                    </div>
                    <div>
                        <h5 class="font-bold text-gray-800 text-lg">Address</h5>
                        <p class="text-gray-600">Kp. Cijulang, RT 03/RW 07, Desa Sukaharja, Kecamatan Cijeruk, Kabupaten Bogor</p>
                    </div>
                </div>

                <div class="flex items-start space-x-4">
                    <div class="text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M5 3.461c0 .978.001 16.224 0 17.213-.002 2.214 3.508 3.326 7.014 3.326 3.495 0 6.986-1.105 6.986-3.326v-17.213c0-2.348-3.371-3.461-6.805-3.461-3.563 0-7.195 1.199-7.195 3.461zm7-1.461c.276 0 .5.223.5.5 0 .276-.224.5-.5.5s-.5-.224-.5-.5c0-.277.224-.5.5-.5zm0 20c-.552 0-1-.448-1-1 0-.553.448-1 1-1s1 .447 1 1c0 .552-.448 1-1 1zm5-3h-10v-15h10v15z" />
                        </svg>
                    </div>
                    <div>
                        <h5 class="font-bold text-gray-800 text-lg">Phone</h5>
                        <p class="text-gray-600">+6285697461625</p>
                    </div>
                </div>

                <div class="flex items-start space-x-4">
                    <div class="text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M0 3v18h24v-18h-24zm21.518 2l-9.518 7.713-9.518-7.713h19.036zm-19.518 14v-11.817l10 8.104 10-8.104v11.817h-20z" />
                        </svg>
                    </div>
                    <div>
                        <h5 class="font-bold text-gray-800 text-lg">Email</h5>
                        <p class="text-gray-600">adangpardiman33@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<footer class="bg-gray-900 text-gray-300 pt-12 pb-6">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
            {{-- Brand Info --}}
            <div class="col-span-1 md:col-span-1">
                <img src="{{ url('images/logo.png') }}" class="w-16 mb-4 brightness-0 invert" alt="Logo">
                <p class="text-sm leading-relaxed">
                    Kami menyediakan berbagai macam kebutuhan ternak berkualitas terbaik untuk mendukung keberhasilan usaha peternakan Anda.
                </p>
            </div>

            {{-- Tautan Cepat --}}
            <div>
                <h5 class="text-white font-bold mb-4 uppercase text-sm tracking-wider">Tautan Cepat</h5>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ url('home') }}" class="hover:text-green-400 transition">Beranda</a></li>
                    <li><a href="{{ url('check-out') }}" class="hover:text-green-400 transition">Keranjang Belanja</a></li>
                    <li><a href="{{ url('history') }}" class="hover:text-green-400 transition">Riwayat Pesanan</a></li>
                </ul>
            </div>

            {{-- Kontak --}}
            <div>
                <h5 class="text-white font-bold mb-4 uppercase text-sm tracking-wider">Kontak Kami</h5>
                <ul class="space-y-2 text-sm">
                    <li class="flex items-start">
                        <i class="fas fa-map-marker-alt mt-1 mr-3 text-green-500"></i>
                        <span>Kp. Cijulang, RT 03/RW 07, Desa Sukaharja, Kecamatan Cijeruk, Kabupaten Bogor</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-phone mr-3 text-green-500"></i>
                        <span>+6285697461625</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-envelope mr-3 text-green-500"></i>
                        <span>adangpardiman33@gmail.com</span>
                    </li>
                </ul>
            </div>

            {{-- Social Media --}}
            <div>
                <h5 class="text-white font-bold mb-4 uppercase text-sm tracking-wider">Ikuti Kami</h5>
                <div class="flex space-x-4">
                    <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-green-600 transition text-white">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-green-600 transition text-white">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-green-600 transition text-white">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
            </div>
        </div>

        <hr class="border-gray-800 mb-6">

        <div class="text-center text-sm">
            <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
        </div>
    </div>
</footer>