@extends('layouts.app')

@section('content')
<div class="min-h-screen w-full flex overflow-hidden bg-white">
    
    <div class="hidden lg:relative lg:block lg:w-1/2 xl:w-7/12">
        <img src="https://images.unsplash.com/photo-1589923188900-85dae523342b?q=80&w=2070&auto=format&fit=crop" 
             alt="Registration Background" 
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
                        "Bergabunglah dengan komunitas peternak modern dan mulai digitalkan manajemen ternak Anda hari ini."
                    </p>
                    <footer class="pt-4 border-t border-white/20">
                        <p class="font-bold text-xl uppercase tracking-widest text-green-400">Pendaftaran Anggota</p>
                        <p class="text-sm text-gray-300">Langkah awal menuju efisiensi peternakan.</p>
                    </footer>
                </blockquote>
            </div>
        </div>
    </div>

    <div class="w-full lg:w-1/2 xl:w-5/12 flex items-center justify-center p-8 sm:p-16 bg-white overflow-y-auto">
        <div class="w-full max-w-md">
            <div class="lg:hidden flex justify-center mb-6">
                <span class="h-12 w-12 bg-green-600 rounded-lg flex items-center justify-center">
                    <i class="fas fa-seedling text-white text-xl"></i>
                </span>
            </div>

            <div class="mb-8">
                <h2 class="text-4xl font-black text-gray-900 tracking-tight mb-2 italic">
                    {{ __('Create Account') }}
                </h2>
                <p class="text-lg text-gray-500 font-medium">
                    Daftarkan data diri Anda untuk memulai.
                </p>
            </div>

            <form id="registerForm" method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <div class="group">
                    <label for="name" class="block text-sm font-bold text-gray-700 mb-1 transition-colors group-focus-within:text-green-600">
                        {{ __('Full Name') }}
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400">
                            <i class="far fa-user"></i>
                        </span>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                            class="w-full pl-11 pr-4 py-3 rounded-xl border-2 @error('name') border-red-500 @else border-gray-100 bg-gray-50 @enderror focus:bg-white focus:border-green-500 focus:ring-4 focus:ring-green-500/10 outline-none transition-all duration-300"
                            placeholder="Nama Lengkap">
                    </div>
                    @error('name')
                        <p class="mt-1 text-xs text-red-600 font-bold italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="group">
                    <label for="email" class="block text-sm font-bold text-gray-700 mb-1 transition-colors group-focus-within:text-green-600">
                        {{ __('Email Address') }}
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400">
                            <i class="far fa-envelope"></i>
                        </span>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email"
                            class="w-full pl-11 pr-4 py-3 rounded-xl border-2 @error('email') border-red-500 @else border-gray-100 bg-gray-50 @enderror focus:bg-white focus:border-green-500 focus:ring-4 focus:ring-green-500/10 outline-none transition-all duration-300"
                            placeholder="name@example.com">
                    </div>
                    @error('email')
                        <p class="mt-1 text-xs text-red-600 font-bold italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="group">
                    <label for="password" class="block text-sm font-bold text-gray-700 mb-1 transition-colors group-focus-within:text-green-600">
                        {{ __('Password') }}
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input id="password" type="password" name="password" required autocomplete="new-password"
                            class="w-full pl-11 pr-4 py-3 rounded-xl border-2 @error('password') border-red-500 @else border-gray-100 bg-gray-50 @enderror focus:bg-white focus:border-green-500 focus:ring-4 focus:ring-green-500/10 outline-none transition-all duration-300"
                            placeholder="••••••••">
                    </div>
                    @error('password')
                        <p class="mt-1 text-xs text-red-600 font-bold italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="group">
                    <label for="password-confirm" class="block text-sm font-bold text-gray-700 mb-1 transition-colors group-focus-within:text-green-600">
                        {{ __('Confirm Password') }}
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400">
                            <i class="fas fa-check-double"></i>
                        </span>
                        <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password"
                            class="w-full pl-11 pr-4 py-3 rounded-xl border-2 border-gray-100 bg-gray-50 focus:bg-white focus:border-green-500 focus:ring-4 focus:ring-green-500/10 outline-none transition-all duration-300"
                            placeholder="Ulangi Password">
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" id="registerBtn"
                        class="w-full flex justify-center items-center py-4 px-4 border border-transparent rounded-xl shadow-xl text-base font-black text-white bg-green-600 hover:bg-green-700 hover:shadow-green-500/30 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all duration-300 uppercase tracking-widest">
                        <span>{{ __('Daftar Sekarang') }}</span>
                        <i class="fas fa-user-plus ml-3"></i>
                    </button>
                </div>

                <div class="text-center pt-6">
                    <p class="text-gray-500 font-medium">
                        Sudah punya akun? 
                        <a href="{{ route('login') }}" class="font-black text-green-600 hover:text-green-700 underline decoration-4 decoration-green-100 hover:decoration-green-500 transition-all underline-offset-4">
                            Login di sini
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function () {
    const registerForm = document.getElementById('registerForm');
    const registerBtn = document.getElementById('registerBtn');
    
    registerForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Validasi dasar HTML5
        if (!this.checkValidity()) {
            this.reportValidity();
            return;
        }
        
        // Cek kecocokan password
        const password = document.getElementById('password').value;
        const passwordConfirm = document.getElementById('password-confirm').value;
        
        if (password !== passwordConfirm) {
            Swal.fire({
                title: 'Password Tidak Cocok!',
                text: 'Password dan konfirmasi password harus sama.',
                icon: 'error',
                confirmButtonColor: '#10b981', // green-500
                confirmButtonText: 'Perbaiki'
            });
            return;
        }
        
        // Konfirmasi SweetAlert
        Swal.fire({
            title: 'Konfirmasi Registrasi',
            text: 'Pastikan data yang Anda isi sudah benar.',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#059669', // green-600
            cancelButtonColor: '#6b7280', // gray-500
            confirmButtonText: 'Ya, Daftar!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Loading State
                registerBtn.disabled = true;
                registerBtn.innerHTML = `
                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span>Mendaftarkan...</span>
                `;
                
                Swal.fire({
                    title: 'Memproses Data',
                    text: 'Membuat akun peternakan Anda...',
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });
                
                this.submit();
            }
        });
    });
});
</script>
@endpush