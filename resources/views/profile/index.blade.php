@extends('layouts.app')
@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <div class="mb-4">
            <a href="{{ url('home') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition duration-300 shadow-md">
                <i class="fa fa-arrow-left mr-2"></i> Kembali
            </a>
        </div>

        <nav class="flex mb-6 text-gray-600 text-sm" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ url('home') }}" class="hover:text-blue-600 transition-colors">Home</a>
                </li>
                <li>
                    <div class="flex items-center">
                        <i class="fa fa-chevron-right text-xs mx-2 text-gray-400"></i>
                        <span class="font-bold text-gray-900">Profile</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-8 border border-gray-100">
            <div class="p-6">
                <h4 class="text-xl font-bold text-gray-800 flex items-center mb-6">
                    <i class="fa fa-user text-blue-500 mr-3"></i> My Profile
                </h4>
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-gray-700">
                        <tbody class="divide-y divide-gray-100">
                            <tr>
                                <td class="py-3 font-semibold w-1/4">Nama</td>
                                <td class="py-3 px-2 w-4">:</td>
                                <td class="py-3">{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <td class="py-3 font-semibold">Email</td>
                                <td class="py-3 px-2">:</td>
                                <td class="py-3">{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <td class="py-3 font-semibold">No HP</td>
                                <td class="py-3 px-2">:</td>
                                <td class="py-3">{{ $user->nohp }}</td>
                            </tr>
                            <tr>
                                <td class="py-3 font-semibold">Alamat</td>
                                <td class="py-3 px-2">:</td>
                                <td class="py-3">{{ $user->alamat }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="p-6">
                <h4 class="text-xl font-bold text-gray-800 flex items-center mb-8">
                    <i class="fa fa-pencil-alt text-green-500 mr-3"></i> Edit Profile
                </h4>
                
                <form id="profileForm" method="POST" action="{{ url('profile') }}" class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-center">
                        <label for="name" class="md:text-right font-medium text-gray-700">{{ __('Name') }}</label>
                        <div class="md:col-span-2">
                            <input id="name" type="text" name="name" value="{{ $user->name }}" required autofocus
                                class="w-full px-4 py-2 border @error('name') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition duration-200">
                            @error('name')
                                <p class="mt-1 text-xs text-red-500 font-bold">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-center">
                        <label for="email" class="md:text-right font-medium text-gray-700">{{ __('E-Mail Address') }}</label>
                        <div class="md:col-span-2">
                            <input id="email" type="email" name="email" value="{{ $user->email }}" required
                                class="w-full px-4 py-2 border @error('email') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition duration-200">
                            @error('email')
                                <p class="mt-1 text-xs text-red-500 font-bold">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-center">
                        <label for="nohp" class="md:text-right font-medium text-gray-700">No. HP</label>
                        <div class="md:col-span-2">
                            <input id="nohp" type="text" name="nohp" value="{{ $user->nohp }}" required
                                class="w-full px-4 py-2 border @error('nohp') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition duration-200">
                            @error('nohp')
                                <p class="mt-1 text-xs text-red-500 font-bold">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-start">
                        <label for="alamat" class="md:text-right font-medium text-gray-700 pt-2">Alamat</label>
                        <div class="md:col-span-2">
                            <textarea name="alamat" id="alamat" rows="3" required
                                class="w-full px-4 py-2 border @error('alamat') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition duration-200">{{ $user->alamat }}</textarea>
                            @error('alamat')
                                <p class="mt-1 text-xs text-red-500 font-bold">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-center">
                        <label for="password" class="md:text-right font-medium text-gray-700">{{ __('Password') }}</label>
                        <div class="md:col-span-2">
                            <input id="password" type="password" name="password" placeholder="Kosongkan jika tidak diganti"
                                class="w-full px-4 py-2 border @error('password') border-red-500 @else border-gray-300 @enderror rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition duration-200">
                            @error('password')
                                <p class="mt-1 text-xs text-red-500 font-bold">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-center">
                        <label for="password-confirm" class="md:text-right font-medium text-gray-700 text-sm">Konfirmasi Password</label>
                        <div class="md:col-span-2">
                            <input id="password-confirm" type="password" name="password_confirmation"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition duration-200">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-8">
                        <div></div>
                        <div class="md:col-span-2">
                            <button type="submit" id="saveBtn" 
                                class="w-full md:w-auto px-10 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition duration-200 flex items-center justify-center">
                                <i class="fa fa-save mr-2"></i> Update Profile
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('profileForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    if (!this.checkValidity()) {
        this.reportValidity();
        return;
    }
    
    Swal.fire({
        title: 'Update Profile',
        text: 'Apakah Anda yakin ingin mengupdate profile Anda?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#2563eb', // Tailwind blue-600
        cancelButtonColor: '#64748b',  // Tailwind slate-500
        confirmButtonText: 'Ya, Update!',
        cancelButtonText: 'Batal',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            const saveBtn = document.getElementById('saveBtn');
            
            saveBtn.disabled = true;
            saveBtn.classList.add('opacity-75', 'cursor-not-allowed');
            saveBtn.innerHTML = '<i class="fa fa-spinner fa-spin mr-2"></i> Menyimpan...';
            
            Swal.fire({
                title: 'Menyimpan...',
                text: 'Mohon tunggu sebentar',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });
            
            this.submit();
        }
    });
});
</script>
@endsection