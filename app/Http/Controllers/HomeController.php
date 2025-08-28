<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function index()
    {
        try {
            $barangs = Barang::paginate(6); // tampilkan 6 item per halaman

            $notif = 0;
            if (Auth::check()) {
                $pesanan_utama = Pesanan::where('user_id', Auth::id())
                    ->where('status', 0)
                    ->first();

                $notif = $pesanan_utama
                    ? PesananDetail::where('pesanan_id', $pesanan_utama->id)->count()
                    : 0;
            }

            // Show welcome message for authenticated users
            if (Auth::check() && session()->has('welcome_message')) {
                Alert::success('Selamat Datang!', 'Selamat datang kembali, ' . Auth::user()->name . '!');
                session()->forget('welcome_message');
            }

            return view('home', compact('barangs', 'notif'));
        } catch (\Exception $e) {
            Alert::error('Gagal!', 'Terjadi kesalahan saat memuat halaman utama: ' . $e->getMessage());
            return view('home', compact('barangs', 'notif'));
        }
    }
}
