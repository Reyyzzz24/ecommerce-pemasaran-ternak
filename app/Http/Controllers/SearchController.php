<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang; // Pastikan model ini sesuai dengan database kamu

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');

        // Cari produk berdasarkan nama (atau kolom lain sesuai kebutuhan)
        $barangs = Barang::where('nama_barang', 'LIKE', "%$query%")->get();

        return view('search.index', compact('barangs', 'query'));
    }
}
