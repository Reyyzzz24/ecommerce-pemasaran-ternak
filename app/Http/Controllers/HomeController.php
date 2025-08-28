<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
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

        return view('home', compact('barangs', 'notif'));
    }
}
