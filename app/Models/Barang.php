<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = [
        'nama_barang', 'gambar', 'harga', 'stok', 'keterangan',
    ];

    // Relasi dengan PesananDetail
    public function pesanan_detail() 
    {
        return $this->hasMany(PesananDetail::class, 'barang_id', 'id');
    }
}
