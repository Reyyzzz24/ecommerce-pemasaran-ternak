@extends('layouts.app')

@section('content')
<div class="min-h-screen w-full flex overflow-hidden bg-white">

    <div class="hidden lg:relative lg:block lg:w-1/2 xl:w-7/12">
        <img src="https://images.unsplash.com/photo-1500595046743-cd271d694d30?q=80&w=2070&auto=format&fit=crop"
            alt="Farm Background"
            class="absolute inset-0 h-full w-full object-cover">

        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent flex flex-col justify-end p-16">
            <div class="max-w-xl">
                <div class="flex items-center space-x-3 mb-6">
                    <a href="{{ url('/') }}" class="flex-shrink-0">
                        <img src="{{ url('images/logo.png') }}" class="w-16 brightness-0 invert" alt="Logo">
                    </a>
                    <span class="text-white text-2xl font-bold tracking-tight">Berkah Tani</span>
                </div>

                <blockquote class="text-white space-y-4">
                    <p class="text-3xl font-light leading-tight italic">
                        "Teknologi terbaik untuk hasil ternak yang maksimal. Kelola aset Anda dengan cara yang lebih modern."
                    </p>
                    <footer class="pt-4 border-t border-white/20">
                        <p class="font-bold text-xl uppercase tracking-widest text-green-400">Berkah Tani</p>
                        <p class="text-sm text-gray-300">v2.4 — Smart Farming Integrated</p>
                    </footer>
                </blockquote>
            </div>
        </div>
    </div>

    <div class="w-full lg:w-1/2 xl:w-5/12 flex items-center justify-center p-8 sm:p-16 bg-white">
        <div class="w-full max-w-md">
            <div class="lg:hidden flex justify-center mb-8">
                <span class="h-12 w-12 bg-green-600 rounded-lg flex items-center justify-center">
                    <i class="fas fa-tractor text-white text-xl"></i>
                </span>
            </div>

            <div class="mb-10 text-left lg:text-left">
                <h2 class="text-4xl font-black text-gray-900 tracking-tight mb-2 italic">
                    {{ __('Welcome Back') }}
                </h2>
                <p class="text-lg text-gray-500 font-medium">
                    Silakan masuk ke akun manajemen ternak Anda.
                </p>
            </div>

            <form id="loginForm" method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <div class="group">
                    <label for="email" class="block text-sm font-bold text-gray-700 mb-2 transition-colors group-focus-within:text-green-600">
                        {{ __('Email Address') }}
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400">
                            <i class="far fa-envelope"></i>
                        </span>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                            class="w-full pl-11 pr-4 py-4 rounded-xl border-2 @error('email') border-red-500 @else border-gray-100 bg-gray-50 @enderror focus:bg-white focus:border-green-500 focus:ring-4 focus:ring-green-500/10 outline-none transition-all duration-300 text-gray-900"
                            placeholder="name@farm.com">
                    </div>
                    @error('email')
                    <p class="mt-2 text-xs text-red-600 font-bold flex items-center">
                        <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                    </p>
                    @enderror
                </div>

                <div class="group">
                    <div class="flex items-center justify-between mb-2">
                        <label for="password" class="block text-sm font-bold text-gray-700 transition-colors group-focus-within:text-green-600">
                            {{ __('Password') }}
                        </label>
                        @if (Route::has('password.request'))
                        <a class="text-xs font-bold text-green-600 hover:text-green-700 transition" href="{{ route('password.request') }}">
                            {{ __('Lupa Password?') }}
                        </a>
                        @endif
                    </div>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input id="password" type="password" name="password" required autocomplete="current-password"
                            class="w-full pl-11 pr-4 py-4 rounded-xl border-2 @error('password') border-red-500 @else border-gray-100 bg-gray-50 @enderror focus:bg-white focus:border-green-500 focus:ring-4 focus:ring-green-500/10 outline-none transition-all duration-300 text-gray-900"
                            placeholder="••••••••">
                    </div>
                    @error('password')
                    <p class="mt-2 text-xs text-red-600 font-bold flex items-center">
                        <i class="fas fa-exclamation-circle mr-1"></i> {{ $message }}
                    </p>
                    @enderror
                </div>

                <div class="flex items-center">
                    <input class="h-5 w-5 text-green-600 focus:ring-green-500 border-gray-300 rounded-md cursor-pointer transition duration-200"
                        type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="ml-3 block text-sm font-semibold text-gray-600 cursor-pointer select-none" for="remember">
                        {{ __('Ingat saya') }}
                    </label>
                </div>

                <div class="pt-2">
                    <button type="submit" id="loginBtn"
                        class="w-full flex justify-center items-center py-4 px-4 border border-transparent rounded-xl shadow-xl text-base font-black text-white bg-green-600 hover:bg-green-700 hover:shadow-green-500/30 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all duration-300 uppercase tracking-widest">
                        <span>{{ __('Login Sekarang') }}</span>
                        <i class="fas fa-arrow-right ml-3"></i>
                    </button>
                </div>

                <div class="relative py-6">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t-2 border-gray-100"></div>
                    </div>
                    <div class="relative flex justify-center text-sm"><span class="px-4 bg-white text-gray-400 font-bold">OR</span></div>
                </div>

                @if (Route::has('register'))
                <div class="text-center">
                    <p class="text-gray-500 font-medium">
                        Baru di Berkah Tani?
                        <a href="{{ route('register') }}" class="font-black text-green-600 hover:text-green-700 underline decoration-4 decoration-green-100 hover:decoration-green-500 transition-all underline-offset-4">
                            Buat Akun
                        </a>
                    </p>
                </div>
                @endif
            </form>

            <p class="mt-12 text-center text-xs text-gray-400 font-bold uppercase tracking-[0.2em]">
                &copy; {{ date('Y') }} Berkah Tani Systems
            </p>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const loginForm = document.getElementById('loginForm');
        const loginBtn = document.getElementById('loginBtn');

        loginForm.addEventListener('submit', function(e) {
            if (!this.checkValidity()) return;

            e.preventDefault();
            loginBtn.disabled = true;
            loginBtn.classList.add('opacity-80', 'cursor-not-allowed');
            loginBtn.innerHTML = `
                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span>Autentikasi...</span>
            `;

            Swal.fire({
                title: 'Menghubungkan ke Server',
                html: '<p class="text-sm">Memverifikasi kredensial peternakan Anda...</p>',
                allowOutsideClick: false,
                showConfirmButton: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            this.submit();
        });
    });
</script>
@endpush