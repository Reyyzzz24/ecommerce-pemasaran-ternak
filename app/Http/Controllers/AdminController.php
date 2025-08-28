<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        return view('admin.barang.index', compact('barangs'));
    }

    public function create()
    {
        return view('admin.barang.create');
    }

    // Menyimpan data barang
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'keterangan' => 'required|string',
        ]);

        try {
            // Proses upload gambar
            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads'), $filename);
            } else {
                $filename = '';
            }

            Barang::create([
                'nama_barang' => $request->nama_barang,
                'gambar' => $filename,
                'harga' => $request->harga,
                'stok' => $request->stok,
                'keterangan' => $request->keterangan,
            ]);

            Alert::success('Berhasil!', 'Barang berhasil ditambahkan ke database.');
            return redirect()->route('admin.barang.index');
        } catch (\Exception $e) {
            Alert::error('Gagal!', 'Terjadi kesalahan saat menambahkan barang. Silakan coba lagi.');
            return back()->withInput();
        }
    }

    // Menghapus barang
    public function destroy($id)
    {
        try {
            $barang = Barang::findOrFail($id);
            $barang->delete();

            Alert::success('Berhasil!', 'Barang berhasil dihapus dari database.');
            return redirect()->route('admin.barang.index');
        } catch (\Exception $e) {
            Alert::error('Gagal!', 'Terjadi kesalahan saat menghapus barang. Silakan coba lagi.');
            return back();
        }
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('admin.barang.edit', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'keterangan' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            // Proses upload gambar baru jika ada
            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads'), $filename);
                $barang->gambar = $filename;
            }

            $barang->nama_barang = $request->nama_barang;
            $barang->harga = $request->harga;
            $barang->stok = $request->stok;
            $barang->keterangan = $request->keterangan;
            $barang->save();

            Alert::success('Berhasil!', 'Data barang berhasil diupdate.');
            return redirect()->route('admin.barang.index');
        } catch (\Exception $e) {
            Alert::error('Gagal!', 'Terjadi kesalahan saat mengupdate barang. Silakan coba lagi.');
            return back()->withInput();
        }
    }
}
