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
                        "Jangan khawatir, kami akan membantu Anda kembali ke dashboard peternakan Anda dengan aman."
                    </p>
                </blockquote>
            </div>
        </div>
    </div>

    <div class="w-full lg:w-1/2 xl:w-5/12 flex items-center justify-center p-8 sm:p-16 bg-white">
        <div class="w-full max-w-md">
            <div class="lg:hidden flex justify-center mb-8">
                <span class="h-12 w-12 bg-amber-500 rounded-lg flex items-center justify-center">
                    <i class="fas fa-unlock-alt text-white text-xl"></i>
                </span>
            </div>

            <div class="mb-8">
                <h2 class="text-4xl font-black text-gray-900 tracking-tight mb-4 italic">
                    {{ __('Forgot Password?') }}
                </h2>
                <p class="text-lg text-gray-500 font-medium">
                    Masukkan email Anda, kami akan mengirimkan link untuk mengatur ulang kata sandi.
                </p>
            </div>

            @if (session('status'))
            <div class="flex items-center p-4 mb-6 text-amber-800 rounded-xl bg-amber-50 border border-amber-200 shadow-sm" role="alert">
                <i class="fas fa-paper-plane mr-3 text-amber-600"></i>
                <div class="text-sm font-bold">
                    {{ session('status') }}
                </div>
            </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
                @csrf

                <div class="group">
                    <label for="email" class="block text-sm font-bold text-gray-700 mb-1 transition-colors group-focus-within:text-amber-600">
                        {{ __('Email Address') }}
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400">
                            <i class="far fa-envelope"></i>
                        </span>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                            class="w-full pl-11 pr-4 py-4 rounded-xl border-2 @error('email') border-red-500 @else border-gray-100 bg-gray-50 @enderror focus:bg-white focus:border-amber-500 focus:ring-4 focus:ring-amber-500/10 outline-none transition-all duration-300"
                            placeholder="name@example.com">
                    </div>
                    @error('email')
                    <p class="mt-2 text-xs text-red-600 font-bold italic">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <button type="submit" id="submitBtn"
                        class="w-full flex justify-center items-center py-4 px-4 border border-transparent rounded-xl shadow-xl text-base font-black text-white bg-amber-600 hover:bg-amber-700 hover:shadow-amber-500/30 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 transition-all duration-300 uppercase tracking-widest">
                        <span>{{ __('Send Reset Link') }}</span>
                        <i class="fas fa-arrow-right ml-3 text-sm"></i>
                    </button>
                </div>
            </form>

            <div class="mt-10 text-center">
                <p class="text-gray-500 font-medium">
                    Ingat kata sandi Anda?
                    <a href="{{ route('login') }}" class="font-black text-amber-600 hover:text-amber-700 underline decoration-4 decoration-amber-100 hover:decoration-amber-500 transition-all underline-offset-4">
                        Kembali ke Login
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const form = document.querySelector('form');
        const btn = document.getElementById('submitBtn');

        form.addEventListener('submit', function() {
            btn.disabled = true;
            btn.innerHTML = `
                <i class="fas fa-circle-notch animate-spin mr-3"></i>
                Mengirim...
            `;

            Swal.fire({
                title: 'Mohon Tunggu',
                text: 'Sedang mengirimkan link reset ke email Anda...',
                allowOutsideClick: false,
                showConfirmButton: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });
        });
    });
</script>
@endpush