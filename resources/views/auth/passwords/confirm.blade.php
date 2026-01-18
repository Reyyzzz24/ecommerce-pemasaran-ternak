@extends('layouts.app')

@section('content')
<div class="min-h-screen w-full flex overflow-hidden bg-white">
    
    <div class="hidden lg:relative lg:block lg:w-1/2 xl:w-7/12">
        <img src="https://images.unsplash.com/photo-1558444479-c84824d29328?q=80&w=2070&auto=format&fit=crop" 
             alt="Confirm Password Background" 
             class="absolute inset-0 h-full w-full object-cover">
        
        <div class="absolute inset-0 bg-gradient-to-t from-indigo-900/80 via-transparent to-transparent flex flex-col justify-end p-16">
            <div class="max-w-xl">
                <div class="flex items-center space-x-3 mb-6">
                    <span class="h-12 w-12 bg-indigo-600 rounded-lg flex items-center justify-center shadow-lg">
                        <i class="fas fa-user-shield text-white text-xl"></i>
                    </span>
                    <span class="text-white text-2xl font-bold tracking-tight">Nucleus Farm Security</span>
                </div>
                
                <blockquote class="text-white space-y-4">
                    <p class="text-3xl font-light leading-tight italic">
                        "Kami menjaga data Anda tetap aman. Konfirmasi identitas Anda diperlukan untuk mengakses area ini."
                    </p>
                </blockquote>
            </div>
        </div>
    </div>

    <div class="w-full lg:w-1/2 xl:w-5/12 flex items-center justify-center p-8 sm:p-16 bg-white">
        <div class="w-full max-w-md">
            <div class="lg:hidden flex justify-center mb-8">
                <span class="h-12 w-12 bg-indigo-600 rounded-lg flex items-center justify-center">
                    <i class="fas fa-lock text-white text-xl"></i>
                </span>
            </div>

            <div class="mb-8">
                <h2 class="text-4xl font-black text-gray-900 tracking-tight mb-4 italic uppercase">
                    {{ __('Confirm Access') }}
                </h2>
                <div class="p-4 bg-indigo-50 border-l-4 border-indigo-500 rounded-r-xl">
                    <p class="text-sm text-indigo-700 font-medium">
                        {{ __('Demi keamanan, silakan konfirmasi password Anda sebelum melanjutkan ke halaman berikutnya.') }}
                    </p>
                </div>
            </div>

            <form method="POST" action="{{ route('password.confirm') }}" class="space-y-6">
                @csrf

                <div class="group">
                    <label for="password" class="block text-sm font-bold text-gray-700 mb-1 transition-colors group-focus-within:text-indigo-600">
                        {{ __('Password Anda') }}
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400">
                            <i class="fas fa-key"></i>
                        </span>
                        <input id="password" type="password" name="password" required autocomplete="current-password"
                            class="w-full pl-11 pr-4 py-4 rounded-xl border-2 @error('password') border-red-500 @else border-gray-100 bg-gray-50 @enderror focus:bg-white focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 outline-none transition-all duration-300"
                            placeholder="••••••••">
                    </div>
                    @error('password')
                        <p class="mt-2 text-xs text-red-600 font-bold italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-4">
                    <button type="submit" 
                        class="w-full flex justify-center items-center py-4 px-4 border border-transparent rounded-xl shadow-xl text-base font-black text-white bg-indigo-600 hover:bg-indigo-700 hover:shadow-indigo-500/30 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-300 uppercase tracking-widest">
                        <span>{{ __('Konfirmasi Password') }}</span>
                        <i class="fas fa-shield-alt ml-3"></i>
                    </button>

                    @if (Route::has('password.request'))
                        <div class="text-center">
                            <a class="text-sm font-bold text-gray-400 hover:text-indigo-600 transition-colors" href="{{ route('password.request') }}">
                                {{ __('Lupa Password?') }}
                            </a>
                        </div>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
@endsection