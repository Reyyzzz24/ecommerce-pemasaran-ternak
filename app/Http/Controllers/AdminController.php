<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;


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
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif',
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

            $barang = Barang::create([
                'nama_barang' => $request->nama_barang,
                'gambar' => $filename,
                'harga' => $request->harga,
                'stok' => $request->stok,
                'keterangan' => $request->keterangan,
            ]);

            return redirect()->route('admin.barang.index')->with('success', 'Barang "' . $barang->nama_barang . '" berhasil ditambahkan ke database dengan stok ' . $barang->stok . ' ekor.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Terjadi kesalahan saat menambahkan barang: ' . $e->getMessage());
        }
    }

    // Menghapus barang
    public function destroy($id)
    {
        try {
            $barang = Barang::findOrFail($id);
            $namaBarang = $barang->nama_barang;
            $barang->delete();

            return redirect()->route('admin.barang.index')->with('success', 'Barang "' . $namaBarang . '" berhasil dihapus dari database.');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat menghapus barang: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $barang = Barang::findOrFail($id);
            return view('admin.barang.edit', compact('barang'));
        } catch (\Exception $e) {
            return redirect()->route('admin.barang.index')->with('error', 'Barang tidak ditemukan: ' . $e->getMessage());
        }
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
            $oldStock = $barang->stok;
            $oldName = $barang->nama_barang;
            
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

            // Show different messages based on what changed
            $changes = [];
            if ($oldName !== $request->nama_barang) {
                $changes[] = 'nama barang dari "' . $oldName . '" menjadi "' . $request->nama_barang . '"';
            }
            if ($oldStock !== $request->stok) {
                $changes[] = 'stok dari ' . $oldStock . ' menjadi ' . $request->stok . ' ekor';
            }
            if ($request->hasFile('gambar')) {
                $changes[] = 'gambar produk';
            }
            
            $changeMessage = count($changes) > 0 ? 'Perubahan: ' . implode(', ', $changes) : 'Data berhasil diperbarui';
            
            return redirect()->route('admin.barang.index')->with('success', $changeMessage);
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Terjadi kesalahan saat mengupdate barang: ' . $e->getMessage());
        }
    }
}
