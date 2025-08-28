<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pesanan;
use App\Models\User;
use App\Models\PesananDetail;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        try {
            $pesanans = Pesanan::where('user_id', Auth::user()->id)->where('status', '!=', 0)->get();
            return view('history.index', compact('pesanans'));
        } catch (\Exception $e) {
            Alert::error('Gagal!', 'Terjadi kesalahan saat memuat riwayat pesanan: ' . $e->getMessage());
            return redirect('/home');
        }
    }

    public function detail($id)
    {
        try {
            $pesanan = Pesanan::where('id', $id)->firstOrFail();

            // Verify user owns this order
            if ($pesanan->user_id !== Auth::user()->id) {
                Alert::error('Akses Ditolak!', 'Anda tidak memiliki akses ke pesanan ini.');
                return redirect('history');
            }

            $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();

            // cek kalau ada barang yang sudah dihapus
            $expired = false;
            foreach ($pesanan_details as $detail) {
                if (!$detail->barang) {
                    $expired = true;
                    break;
                }
            }

            if ($expired) {
                Alert::warning('Pesanan Expired', 'Barang dalam pesanan ini sudah tidak tersedia.');
                return redirect('history');
            }

            return view('history.detail', compact('pesanan', 'pesanan_details'));
        } catch (\Exception $e) {
            Alert::error('Gagal!', 'Terjadi kesalahan saat memuat detail pesanan: ' . $e->getMessage());
            return redirect('history');
        }
    }
}
