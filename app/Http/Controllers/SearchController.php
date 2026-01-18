<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use RealRashid\SweetAlert\Facades\Alert;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        try {
            $query = $request->input('query');

            if (empty($query)) {
                Alert::info('Pencarian Kosong', 'Silakan masukkan kata kunci untuk mencari produk.');
                return redirect('/home');
            }

            // Cari produk berdasarkan nama (atau kolom lain sesuai kebutuhan)
            $barangs = Barang::where('nama_barang', 'LIKE', "%$query%")->get();
            
            $count = $barangs->count();
            if ($count > 0) {
                Alert::success('Pencarian Berhasil!', 'Ditemukan ' . $count . ' produk yang sesuai dengan "' . $query . '".');
            } else {
                Alert::warning('Tidak Ditemukan', 'Tidak ada produk yang sesuai dengan "' . $query . '". Silakan coba kata kunci lain.');
            }

            return view('search.index', compact('barangs', 'query'));
        } catch (\Exception $e) {
            Alert::error('Gagal!', 'Terjadi kesalahan saat melakukan pencarian: ' . $e->getMessage());
            return redirect('/home');
        }
    }
}
