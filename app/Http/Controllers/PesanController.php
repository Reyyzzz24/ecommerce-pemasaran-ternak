<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pesanan;
use App\Models\User;
use App\Models\PesananDetail;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        try {
            $barang = Barang::where('id', $id)->firstOrFail();
            return view('pesan.index', compact('barang'));
        } catch (\Exception $e) {
            Alert::error('Gagal!', 'Barang tidak ditemukan: ' . $e->getMessage());
            return redirect('/home');
        }
    }

    public function pesan(Request $request, $id)
    {
        try {
            $barang = Barang::where('id', $id)->firstOrFail();
            $tanggal = Carbon::now();

            //validasi apakah melebihi stok
            if ($request->jumlah_pesan > $barang->stok) {
                Alert::warning('Stok Tidak Cukup!', 'Stok tersedia hanya ' . $barang->stok . ' ekor, sedangkan Anda memesan ' . $request->jumlah_pesan . ' ekor.');
                return redirect('pesan/' . $id);
            }

            //cek validasi
            $cek_pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
            //simpan ke database pesanan
            if (empty($cek_pesanan)) {
                $pesanan = new Pesanan;
                $pesanan->user_id = Auth::user()->id;
                $pesanan->tanggal = $tanggal;
                $pesanan->status = 0;
                $pesanan->jumlah_harga = 0;
                $pesanan->kode = mt_rand(100, 999);
                $pesanan->save();
            }


            //simpan ke database pesanan detail
            $pesanan_baru = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

            //cek pesanan detail
            $cek_pesanan_detail = PesananDetail::where('barang_id', $barang->id)->where('pesanan_id', $pesanan_baru->id)->first();
            if (empty($cek_pesanan_detail)) {
                $pesanan_detail = new PesananDetail;
                $pesanan_detail->barang_id = $barang->id;
                $pesanan_detail->pesanan_id = $pesanan_baru->id;
                $pesanan_detail->jumlah = $request->jumlah_pesan;
                $pesanan_detail->jumlah_harga = $barang->harga * $request->jumlah_pesan;
                $pesanan_detail->save();
            } else {
                $pesanan_detail = PesananDetail::where('barang_id', $barang->id)->where('pesanan_id', $pesanan_baru->id)->first();

                $pesanan_detail->jumlah = $pesanan_detail->jumlah + $request->jumlah_pesan;

                //harga sekarang
                $harga_pesanan_detail_baru = $barang->harga * $request->jumlah_pesan;
                $pesanan_detail->jumlah_harga = $pesanan_detail->jumlah_harga + $harga_pesanan_detail_baru;
                $pesanan_detail->update();
            }

            //jumlah total
            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
            $pesanan->jumlah_harga = $pesanan->jumlah_harga + $barang->harga * $request->jumlah_pesan;
            $pesanan->update();

            Alert::success('Berhasil Ditambahkan!', 'Barang "' . $barang->nama_barang . '" berhasil ditambahkan ke keranjang dengan jumlah ' . $request->jumlah_pesan . ' ekor.');
            return redirect('check-out');
        } catch (\Exception $e) {
            Alert::error('Gagal!', 'Terjadi kesalahan saat menambahkan ke keranjang: ' . $e->getMessage());
            return redirect('pesan/' . $id);
        }
    }

    public function check_out()
    {
        try {
            $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
            $pesanan_details = [];
            if (!empty($pesanan)) {
                $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();
            }

            return view('pesan.check_out', compact('pesanan', 'pesanan_details'));
        } catch (\Exception $e) {
            Alert::error('Gagal!', 'Terjadi kesalahan saat memuat keranjang: ' . $e->getMessage());
            return redirect('/home');
        }
    }

    public function delete($id)
    {
        try {
            $pesanan_detail = PesananDetail::where('id', $id)->firstOrFail();
            $barang = Barang::where('id', $pesanan_detail->barang_id)->first();
            $namaBarang = $barang ? $barang->nama_barang : 'Barang';
            $jumlah = $pesanan_detail->jumlah;

            $pesanan = Pesanan::where('id', $pesanan_detail->pesanan_id)->first();
            $pesanan->jumlah_harga = $pesanan->jumlah_harga - $pesanan_detail->jumlah_harga;
            $pesanan->update();

            $pesanan_detail->delete();

            Alert::success('Berhasil Dihapus!', 'Barang "' . $namaBarang . '" berhasil dihapus dari keranjang (jumlah: ' . $jumlah . ' ekor).');
            return redirect('check-out');
        } catch (\Exception $e) {
            Alert::error('Gagal!', 'Terjadi kesalahan saat menghapus dari keranjang: ' . $e->getMessage());
            return redirect('check-out');
        }
    }

    public function konfirmasi()
    {
        try {
            $user = User::where('id', Auth::user()->id)->first();

            if (empty($user->alamat)) {
                Alert::warning('Data Tidak Lengkap!', 'Alamat harus diisi terlebih dahulu. Silakan lengkapi profil Anda.');
                return redirect('profile');
            }

            if (empty($user->nohp)) {
                Alert::warning('Data Tidak Lengkap!', 'Nomor HP harus diisi terlebih dahulu. Silakan lengkapi profil Anda.');
                return redirect('profile');
            }

            $pesanan = Pesanan::where('user_id', Auth::user()->id)
                ->where('status', 0)
                ->first();

            if (!$pesanan) {
                Alert::warning('Tidak ada pesanan!', 'Anda belum memiliki pesanan yang bisa dikonfirmasi.');
                return redirect('check-out');
            }

            $pesanan_id = $pesanan->id;
            $pesanan->status = 1;
            $pesanan->update();

            $pesanan_details = PesananDetail::where('pesanan_id', $pesanan_id)->get();
            $totalItems = 0;

            foreach ($pesanan_details as $pesanan_detail) {
                $barang = Barang::find($pesanan_detail->barang_id);
                if ($barang) {
                    $barang->stok -= $pesanan_detail->jumlah;
                    $barang->save();
                }
                $totalItems += $pesanan_detail->jumlah;
            }

            Alert::success(
                'Checkout Berhasil!',
                'Pesanan #' . $pesanan->kode . ' berhasil diproses dengan total ' . $totalItems . ' ekor ternak. Silakan lanjutkan proses pembayaran.'
            );
            return redirect('history/' . $pesanan_id);
        } catch (\Exception $e) {
            Alert::error('Gagal!', 'Terjadi kesalahan saat checkout: ' . $e->getMessage());
            return redirect('check-out');
        }
    }
}
