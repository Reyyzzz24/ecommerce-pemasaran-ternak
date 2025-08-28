@include('sweetalert::alert')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts & Icons -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        crossorigin="anonymous">
    <!-- Custom Styles -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>

<body>
    <div id="app">
        {{-- Navbar hanya muncul di home.blade.php --}}
        @if (Request::is('home') || Request::is('/'))
            <nav class="navbar navbar-expand-md navbar-light bg-transparent" style="z-index:10;">
                <div class="container align-items-center">
                    {{-- Logo --}}
                    <a class="navbar-brand text-white font-bold" href="{{ url('/') }}">
                        <img src="{{ url('images/logo.png') }}" width="70" alt="Berkah Tani"
                            style="filter: brightness(0) invert(1);">
                    </a>
                    {{-- Desktop Menu --}}
                    <ul class="navbar-nav d-none d-md-flex ms-3">
                        <li class="nav-item">
                            <a class="nav-link text-white font-bold" href="{{ url('home') }}">Home</a>
                        </li>
                        @auth
                            <li class="nav-item">
                                <a class="nav-link text-white font-bold" href="{{ url('history') }}">Riwayat Pemesanan</a>
                            </li>
                            @if (Auth::user()->role == 'admin')
                                <li class="nav-item">
                                    <a class="nav-link text-white font-bold"
                                        href="{{ route('admin.barang.index') }}">Admin</a>
                                </li>
                            @endif
                        @endauth
                    </ul>

                    {{-- Mobile: Cart + Burger --}}
                    <div class="d-flex d-md-none align-items-center ms-auto">
                        {{-- Cart --}}
                        @auth
                            @php
                                $pesanan_utama = \App\Models\Pesanan::where('user_id', Auth::user()->id)
                                    ->where('status', 0)
                                    ->first();
                                $notif = $pesanan_utama
                                    ? \App\Models\PesananDetail::where('pesanan_id', $pesanan_utama->id)->count()
                                    : 0;
                            @endphp
                            <a class="nav-link position-relative text-white p-0 me-2" href="{{ url('check-out') }}">
                                <i class="fa fa-shopping-cart fa-lg"></i>
                                @if ($notif)
                                    <span
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        {{ $notif }}
                                    </span>
                                @endif
                            </a>
                        @endauth

                        {{-- Burger --}}
                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasMenu" aria-controls="offcanvasMenu"
                            style="border:none;box-shadow:none;margin-top:-8px;">
                            <span class="navbar-toggler-icon" style="filter: brightness(0) invert(1);"></span>
                        </button>
                    </div>

                    {{-- Desktop: Cart + Auth --}}
                    <div class="d-none d-md-flex ms-auto align-items-center gap-3">
                        {{-- Cart --}}
                        @auth
                            <a class="nav-link position-relative text-white font-bold" href="{{ url('check-out') }}">
                                <i class="fa fa-shopping-cart fa-lg"></i>
                                @if ($notif)
                                    <span
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        {{ $notif }}
                                    </span>
                                @endif
                            </a>
                        @endauth

                        {{-- Auth Links --}}
                        @guest
                            <a class="nav-link text-white font-bold" href="{{ route('login') }}">Login</a>
                            @if (Route::has('register'))
                                <a class="nav-link text-white font-bold" href="{{ route('register') }}">Register</a>
                            @endif
                        @else
                            <li class="nav-item dropdown list-unstyled" style="position:relative;z-index:99999;">
                                <a id="navbarDropdown"
                                    class="nav-link dropdown-toggle text-white font-bold d-flex align-items-center gap-2"
                                    href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="fas fa-user-circle fa-lg"></i>
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown"
                                    style="position: absolute !important; z-index: 99999 !important;">
                                    <li>
                                        <a class="dropdown-item" href="{{ url('profile') }}">Profile</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                    </li>
                                </ul>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>

                            </li>
                        @endguest
                    </div>
                </div>
            </nav>
        @endif

        {{-- Offcanvas: Burger Menu --}}
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasMenu">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title text-white font-bold">Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Tutup"></button>
            </div>
            <div class="offcanvas-body">
                {{-- User Info (Auth only) --}}
                @auth
                    <div class="d-flex align-items-center mb-3">
                        <i class="fas fa-user-circle fa-2x me-2 text-dark"></i>
                        <div>
                            <div class="fw-bold text-dark">{{ Auth::user()->name }}</div>
                            <small class="text-muted">Akun Anda</small>
                        </div>
                    </div>
                @endauth

                {{-- Menu Items --}}
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link text-dark font-bold" style="color:#222 !important;"
                            href="{{ url('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link text-dark font-bold" style="color:#222 !important;"
                            href="{{ url('history') }}">Riwayat Pemesanan</a></li>

                    @auth
                        <li class="nav-item"><a class="nav-link text-dark font-bold" style="color:#222 !important;"
                                href="{{ url('profile') }}">Profile</a></li>
                        <li class="nav-item">
                            <a class="nav-link text-danger font-bold" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf
                            </form>
                        </li>
                    @else
                        <li class="nav-item"><a class="nav-link text-dark font-bold" style="color:#222 !important;"
                                href="{{ route('login') }}">Login</a></li>
                        @if (Route::has('register'))
                            <li class="nav-item"><a class="nav-link text-dark font-bold" style="color:#222 !important;"
                                    href="{{ route('register') }}">Register</a></li>
                        @endif
                    @endauth
                </ul>
            </div>
        </div>

        {{-- Main --}}
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    {{-- SweetAlert --}}


</body>

</html>
