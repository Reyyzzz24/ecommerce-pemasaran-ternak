@extends('layouts.app')

@section('content')
<div class="min-h-screen w-full flex overflow-hidden bg-white">
    
    <div class="hidden lg:relative lg:block lg:w-1/2 xl:w-7/12">
        <img src="https://images.unsplash.com/photo-1516253593875-bd7ba052fbc5?q=80&w=2070&auto=format&fit=crop" 
             alt="Email Verification Background" 
             class="absolute inset-0 h-full w-full object-cover">
        
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent flex flex-col justify-end p-16">
            <div class="max-w-xl">
                <div class="flex items-center space-x-3 mb-6">
                    <span class="h-12 w-12 bg-blue-500 rounded-lg flex items-center justify-center shadow-lg">
                        <i class="fas fa-envelope-open-text text-white text-xl"></i>
                    </span>
                    <span class="text-white text-2xl font-bold tracking-tight">Nucleus Farm</span>
                </div>
                
                <blockquote class="text-white space-y-4">
                    <p class="text-3xl font-light leading-tight italic">
                        "Satu langkah lagi untuk mengamankan akun peternakan Anda. Pastikan email Anda valid untuk komunikasi yang lancar."
                    </p>
                </blockquote>
            </div>
        </div>
    </div>

    <div class="w-full lg:w-1/2 xl:w-5/12 flex items-center justify-center p-8 sm:p-16 bg-white">
        <div class="w-full max-w-md">
            <div class="lg:hidden flex justify-center mb-8">
                <span class="h-12 w-12 bg-blue-600 rounded-lg flex items-center justify-center">
                    <i class="fas fa-envelope-open-text text-white text-xl"></i>
                </span>
            </div>

            <div class="mb-8 text-center lg:text-left">
                <h2 class="text-4xl font-black text-gray-900 tracking-tight mb-4 italic">
                    {{ __('Verifikasi Email') }}
                </h2>
                
                @if (session('resent'))
                    <div class="flex items-center p-4 mb-6 text-green-800 rounded-xl bg-green-50 border border-green-200" role="alert">
                        <i class="fas fa-check-circle mr-3"></i>
                        <div class="text-sm font-bold">
                            {{ __('Link verifikasi baru telah dikirim ke email Anda.') }}
                        </div>
                    </div>
                @endif

                <div class="space-y-4">
                    <div class="flex justify-center lg:justify-start">
                        <div class="h-20 w-20 bg-blue-100 rounded-full flex items-center justify-center">
                            <i class="fas fa-paper-plane text-blue-600 text-3xl animate-bounce"></i>
                        </div>
                    </div>
                    
                    <p class="text-lg text-gray-600 leading-relaxed">
                        {{ __('Sebelum melanjutkan, silakan periksa kotak masuk email Anda untuk menemukan link verifikasi.') }}
                    </p>
                    
                    <p class="text-sm text-gray-500 italic bg-gray-50 p-3 rounded-lg border-l-4 border-blue-500">
                        {{ __('Tip: Periksa folder spam jika Anda tidak menemukannya di kotak masuk.') }}
                    </p>
                </div>
            </div>

            <div class="pt-6 border-t border-gray-100">
                <p class="text-gray-600 mb-4 font-medium">
                    {{ __('Jika Anda tidak menerima email tersebut') }},
                </p>
                
                <form id="resendForm" class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" id="resendBtn"
                        class="w-full flex justify-center items-center py-4 px-4 border-2 border-blue-600 rounded-xl text-base font-black text-blue-600 hover:bg-blue-600 hover:text-white transition-all duration-300 uppercase tracking-widest shadow-lg shadow-blue-100">
                        <i class="fas fa-sync-alt mr-3"></i>
                        {{ __('Kirim Ulang Link') }}
                    </button>
                </form>

                <div class="mt-8 text-center">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-sm font-bold text-gray-400 hover:text-red-500 transition-colors uppercase tracking-widest">
                            <i class="fas fa-sign-out-alt mr-2"></i> Keluar & Daftar Lagi
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const resendForm = document.getElementById('resendForm');
        const resendBtn = document.getElementById('resendBtn');

        resendForm.addEventListener('submit', function() {
            resendBtn.disabled = true;
            resendBtn.classList.add('opacity-50', 'cursor-not-allowed');
            resendBtn.innerHTML = `
                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Memproses...
            `;
            
            Swal.fire({
                title: 'Mengirim Ulang...',
                text: 'Kami sedang mengirimkan link baru ke email Anda.',
                allowOutsideClick: false,
                showConfirmButton: false,
                didOpen: () => { Swal.showLoading(); }
            });
        });
    });
</script>
@endpush