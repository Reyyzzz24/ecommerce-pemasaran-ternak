<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        window.SweetAlert = {
            success: function(title, message) {
                Swal.fire({
                    title: title || 'Berhasil!',
                    text: message,
                    icon: 'success',
                    confirmButtonColor: '#10b981'
                });
            },
            error: function(title, message) {
                Swal.fire({
                    title: title || 'Gagal!',
                    text: message,
                    icon: 'error',
                    confirmButtonColor: '#ef4444'
                });
            },
            warning: function(title, message) {
                Swal.fire({
                    title: title || 'Peringatan!',
                    text: message,
                    icon: 'warning',
                    confirmButtonColor: '#f59e0b'
                });
            }
        };
    </script>
</head>

<body class="bg-gray-50 font-sans flex flex-col min-h-screen">
    <div id="app" class="flex-grow">
        {{-- Flash Messages --}}
        @if(session('success'))
        <div id="flash-success" data-message="{{ session('success') }}" class="hidden"></div>
        <script>
            (function() {
                const msg = document.getElementById('flash-success').dataset.message;
                window.SweetAlert.success('Berhasil!', msg);
            })();
        </script>
        @endif

        @if(session('error'))
        <div id="flash-error" data-message="{{ session('error') }}" class="hidden"></div>
        <script>
            (function() {
                const msg = document.getElementById('flash-error').dataset.message;
                window.SweetAlert.error('Gagal!', msg);
            })();
        </script>
        @endif

        {{-- Navbar --}}
        @if (Request::is('home') || Request::is('/'))
        <nav class="absolute top-0 left-0 right-0 z-50 transition-all duration-300">
            <div class="container mx-auto px-4 py-4 flex items-center justify-between">

                <div class="flex-1 flex justify-start">
                    <a href="{{ url('/') }}" class="flex-shrink-0">
                        <img src="{{ url('images/logo.png') }}" class="w-16 brightness-0 invert" alt="Logo">
                    </a>
                </div>

                <div class="hidden md:flex flex-none items-center space-x-10">
                    <a href="{{ url('home') }}" class="text-white font-bold hover:text-green-400 transition">Home</a>
                    @auth
                    <a href="{{ url('history') }}" class="text-white font-bold hover:text-green-400 transition">Riwayat</a>
                    @if (Auth::user()->role == 'admin')
                    <a href="{{ route('admin.barang.index') }}" class="text-white font-bold hover:text-green-400 transition">Admin</a>
                    @endif
                    @endauth
                </div>

                <div class="flex-1 flex items-center justify-end space-x-6">
                    @auth
                    @php
                    $pesanan_utama = \App\Models\Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
                    $notif = $pesanan_utama ? \App\Models\PesananDetail::where('pesanan_id', $pesanan_utama->id)->count() : 0;
                    @endphp

                    <a href="{{ url('check-out') }}" class="relative text-white group">
                        <i class="fa fa-shopping-cart text-xl group-hover:text-green-400 transition"></i>
                        @if ($notif)
                        <span class="absolute -top-2 -right-2 bg-red-600 text-white text-[10px] font-bold px-1.5 rounded-full border-2 border-gray-900">
                            {{ $notif }}
                        </span>
                        @endif
                    </a>

                    {{-- Profile Dropdown --}}
                    <div class="hidden md:block relative group">
                        <button class="flex items-center space-x-2 text-white font-bold focus:outline-none group-hover:text-green-400 transition">
                            <i class="fas fa-user-circle text-xl"></i>
                            <span>{{ Auth::user()->name }}</span>
                        </button>
                        <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 border border-gray-100">
                            <a href="{{ url('profile') }}" class="block px-4 py-2 text-gray-800 hover:bg-green-50 hover:text-green-600 rounded-t-lg transition">Profile</a>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-4 py-2 text-red-600 hover:bg-red-50 rounded-b-lg transition">Logout</a>
                        </div>
                    </div>
                    @else
                    <a href="{{ route('login') }}" class="text-white font-bold hover:text-green-400 transition">Login</a>
                    @endauth

                    {{-- Mobile Burger --}}
                    <button onclick="toggleMobileMenu()" class="md:hidden text-white focus:outline-none hover:text-green-400 transition">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>

            </div>
        </nav>

        {{-- Mobile Sidebar --}}
        <div id="mobileMenu" class="fixed inset-y-0 right-0 w-64 bg-white z-[60] transform translate-x-full transition-transform duration-300 md:hidden shadow-2xl">
            <div class="p-6">
                <div class="flex items-center justify-between mb-8">
                    <h5 class="text-xl font-bold text-gray-800">Menu</h5>
                    <button onclick="toggleMobileMenu()" class="text-gray-500 text-2xl">&times;</button>
                </div>
                <ul class="space-y-6">
                    <li><a href="{{ route('home') }}" class="block text-gray-800 font-bold border-b pb-2">Home</a></li>
                    @auth
                    <li><a href="{{ route('history.index') }}" class="block text-gray-800 font-bold border-b pb-2">Riwayat</a></li>
                    <li><a href="{{ url('profile') }}" class="block text-gray-800 font-bold border-b pb-2">Profile</a></li>
                    <li><a href="{{ route('admin.barang.index') }}" class="block text-gray-800 font-bold border-b pb-2">Admin</a></li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block text-red-600 font-bold">Logout</a>
                    </li>
                    @else
                    <li><a href="{{ route('login') }}" class="block text-gray-800 font-bold border-b pb-2">Login</a></li>
                    @endauth
                </ul>
            </div>
        </div>
        <div id="overlay" onclick="toggleMobileMenu()" class="fixed inset-0 bg-black/50 z-[55] hidden transition-opacity duration-300 md:hidden"></div>
        @endif

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>

        <main>
            @yield('content')
        </main>
    </div>

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            const overlay = document.getElementById('overlay');
            if (menu && overlay) {
                menu.classList.toggle('translate-x-full');
                overlay.classList.toggle('hidden');
            }
        }
    </script>
</body>

</html>