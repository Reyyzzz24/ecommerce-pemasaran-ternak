@extends('layouts.app')

@section('content')
<div class="min-h-screen w-full flex overflow-hidden bg-white">
    
    <div class="hidden lg:relative lg:block lg:w-1/2 xl:w-7/12">
        <img src="https://images.unsplash.com/photo-1516467508483-a7212febe31a?q=80&w=2073&auto=format&fit=crop" 
             alt="Reset Password Background" 
             class="absolute inset-0 h-full w-full object-cover">
        
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent flex flex-col justify-end p-16">
            <div class="max-w-xl">
                <div class="flex items-center space-x-3 mb-6">
                    <span class="h-12 w-12 bg-orange-500 rounded-lg flex items-center justify-center shadow-lg">
                        <i class="fas fa-key text-white text-xl"></i>
                    </span>
                    <span class="text-white text-2xl font-bold tracking-tight">Nucleus Farm</span>
                </div>
                
                <blockquote class="text-white space-y-4">
                    <p class="text-3xl font-light leading-tight italic">
                        "Keamanan data peternakan Anda adalah prioritas kami. Perbarui kata sandi Anda untuk tetap terlindungi."
                    </p>
                </blockquote>
            </div>
        </div>
    </div>

    <div class="w-full lg:w-1/2 xl:w-5/12 flex items-center justify-center p-8 sm:p-16 bg-white overflow-y-auto">
        <div class="w-full max-w-md">
            <div class="lg:hidden flex justify-center mb-6">
                <span class="h-12 w-12 bg-orange-500 rounded-lg flex items-center justify-center">
                    <i class="fas fa-key text-white text-xl"></i>
                </span>
            </div>

            <div class="mb-8">
                <h2 class="text-4xl font-black text-gray-900 tracking-tight mb-2 italic">
                    {{ __('Reset Password') }}
                </h2>
                <p class="text-lg text-gray-500 font-medium">
                    Buat kata sandi baru yang lebih kuat.
                </p>
            </div>

            <form method="POST" action="{{ route('password.update') }}" class="space-y-5">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="group">
                    <label for="email" class="block text-sm font-bold text-gray-700 mb-1 transition-colors group-focus-within:text-orange-600">
                        {{ __('Email Address') }}
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400">
                            <i class="far fa-envelope"></i>
                        </span>
                        <input id="email" type="email" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus
                            class="w-full pl-11 pr-4 py-3 rounded-xl border-2 @error('email') border-red-500 @else border-gray-100 bg-gray-50 @enderror focus:bg-white focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10 outline-none transition-all duration-300"
                            placeholder="name@example.com">
                    </div>
                    @error('email')
                        <p class="mt-1 text-xs text-red-600 font-bold italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="group">
                    <label for="password" class="block text-sm font-bold text-gray-700 mb-1 transition-colors group-focus-within:text-orange-600">
                        {{ __('New Password') }}
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input id="password" type="password" name="password" required autocomplete="new-password"
                            class="w-full pl-11 pr-4 py-3 rounded-xl border-2 @error('password') border-red-500 @else border-gray-100 bg-gray-50 @enderror focus:bg-white focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10 outline-none transition-all duration-300"
                            placeholder="••••••••">
                    </div>
                    @error('password')
                        <p class="mt-1 text-xs text-red-600 font-bold italic">{{ $message }}</p>
                    @enderror
                </div>

                <div class="group">
                    <label for="password-confirm" class="block text-sm font-bold text-gray-700 mb-1 transition-colors group-focus-within:text-orange-600">
                        {{ __('Confirm New Password') }}
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400">
                            <i class="fas fa-shield-alt"></i>
                        </span>
                        <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password"
                            class="w-full pl-11 pr-4 py-3 rounded-xl border-2 border-gray-100 bg-gray-50 focus:bg-white focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10 outline-none transition-all duration-300"
                            placeholder="Ulangi Password Baru">
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" 
                        class="w-full flex justify-center items-center py-4 px-4 border border-transparent rounded-xl shadow-xl text-base font-black text-white bg-orange-600 hover:bg-orange-700 hover:shadow-orange-500/30 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 transition-all duration-300 uppercase tracking-widest">
                        <span>{{ __('Update Password') }}</span>
                        <i class="fas fa-check-circle ml-3"></i>
                    </button>
                </div>
            </form>

            <div class="mt-10 text-center">
                <a href="{{ route('login') }}" class="text-sm font-bold text-gray-400 hover:text-orange-600 transition-colors">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali ke Login
                </a>
            </div>
        </div>
    </div>
</div>
@endsection