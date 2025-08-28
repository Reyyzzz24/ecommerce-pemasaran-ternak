<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Barang::insert([
            [
                'id' => 14,
                'nama_barang' => 'Domba Garut',
                'gambar' => 'domba1.jpeg',
                'harga' => '1100000',
                'stok' => '1',
                'keterangan' => 'Jenis Kelamin: Jantan,\r\nJenis: Garut,\r\nUsia: 4 bulan,\r\nBB: 15 kg,',
                'created_at' => '2025-08-16 08:01:24',
                'updated_at' => '2025-08-27 23:50:50'
            ],
            [
                'id' => 15,
                'nama_barang' => 'Domba Garut',
                'gambar' => 'domba2.jpeg',
                'harga' => '1300000',
                'stok' => '1',
                'keterangan' => 'Jenis Kelamin: Betina,\r\nJenis:garut,\r\nUsia:10bulan,\r\nBB:24kg,',
                'created_at' => '2025-08-18 05:16:45',
                'updated_at' => '2025-08-18 17:20:56'
            ],
            [
                'id' => 16,
                'nama_barang' => 'Domba Priangan',
                'gambar' => 'domba3.jpeg',
                'harga' => '1800000',
                'stok' => '1',
                'keterangan' => 'Jenis Kelamin: Jantan,\r\nJenis: priangan,\r\nUsia: 1 tahun,\r\nBB: 20kg',
                'created_at' => '2025-08-18 05:22:27',
                'updated_at' => '2025-08-18 17:21:30'
            ],
            [
                'id' => 17,
                'nama_barang' => 'Domba Priangan',
                'gambar' => 'domba4.jpeg',
                'harga' => '1800000',
                'stok' => '1',
                'keterangan' => 'Jenis Kelamin: Jantan,\r\nJenis: priangan,\r\nUsia: 1 tahun,\r\nBB: 21kg',
                'created_at' => '2025-08-18 05:45:32',
                'updated_at' => '2025-08-18 17:21:50'
            ],
            [
                'id' => 18,
                'nama_barang' => 'Domba Priangan',
                'gambar' => 'domba5.jpeg',
                'harga' => '1800000',
                'stok' => '1',
                'keterangan' => 'Jenis Kelamin: Jantan,\r\nJenis: priangan,\r\nUsia: 10 bulan,\r\nBB: 19 kg',
                'created_at' => '2025-08-18 06:07:38',
                'updated_at' => '2025-08-27 22:28:57'
            ],
            [
                'id' => 19,
                'nama_barang' => 'Domba Priangan',
                'gambar' => 'domba6.jpeg',
                'harga' => '1800000',
                'stok' => '1',
                'keterangan' => 'Jenis Kelamin: Jantan,\r\nJenis: priangan,\r\nUsia: 1 tahun,\r\nBB: 26 kg',
                'created_at' => '2025-08-18 06:35:58',
                'updated_at' => '2025-08-18 17:22:50'
            ],
            [
                'id' => 20,
                'nama_barang' => 'Domba Priangan',
                'gambar' => 'domba7.jpeg',
                'harga' => '180000',
                'stok' => '1',
                'keterangan' => 'Jenis Kelamin: Jantan,\r\nJenis: priangan,\r\nUsia: 1 tahun,\r\nBB: 22 kg',
                'created_at' => '2025-08-18 06:40:24',
                'updated_at' => '2025-08-18 17:23:12'
            ],
            [
                'id' => 21,
                'nama_barang' => 'Domba Priangan',
                'gambar' => 'domba8.jpeg',
                'harga' => '1800000',
                'stok' => '1',
                'keterangan' => 'Jenis Kelamin: Jantan,\r\nJenis: priangan,\r\nUsia: 1 tahun,\r\nBB: 28 kg',
                'created_at' => '2025-08-18 06:41:56',
                'updated_at' => '2025-08-18 17:23:33'
            ],
            [
                'id' => 22,
                'nama_barang' => 'Domba Priangan',
                'gambar' => 'domba9.jpeg',
                'harga' => '1800000',
                'stok' => '1',
                'keterangan' => 'Jenis Kelamin: Jantan,\r\nJenis: priangan,\r\nUsia: 10 bulan,\r\nBB 21 kg',
                'created_at' => '2025-08-18 06:44:00',
                'updated_at' => '2025-08-18 17:25:35'
            ],
            [
                'id' => 23,
                'nama_barang' => 'Domba Priangan',
                'gambar' => 'domba10.jpeg',
                'harga' => '1800000',
                'stok' => '1',
                'keterangan' => 'Jenis Kelamin: Betina,\r\nJenis: priangan,\r\nUsia: 2 tahun,\r\nBB: 30 kg',
                'created_at' => '2025-08-18 06:51:33',
                'updated_at' => '2025-08-18 17:24:04'
            ],
            [
                'id' => 24,
                'nama_barang' => 'Domba Priangan',
                'gambar' => 'domba11.jpeg',
                'harga' => '1750000',
                'stok' => '1',
                'keterangan' => 'Jenis Kelamin: Betina,\r\nJenis: priangan,\r\nUsia: 2 tahun,\r\nBB: 29 kg',
                'created_at' => '2025-08-18 06:52:54',
                'updated_at' => '2025-08-18 17:24:28'
            ],
            [
                'id' => 25,
                'nama_barang' => 'Domba Priangan',
                'gambar' => 'domba12.jpeg',
                'harga' => '1800000',
                'stok' => '1',
                'keterangan' => 'Jenis Kelamin: Betina,\r\nJenis: priangan,\r\nUsia: 2 tahun,\r\nBB: 32 kg',
                'created_at' => '2025-08-18 07:01:17',
                'updated_at' => '2025-08-18 17:25:54'
            ],
            [
                'id' => 26,
                'nama_barang' => 'Domba Priangan',
                'gambar' => 'domba13.jpeg',
                'harga' => '1800000',
                'stok' => '1',
                'keterangan' => 'Jenis Kelamin: Betina,\r\nJenis: priangan,\r\nUsia: 2 tahun,\r\nBB: 35 kg',
                'created_at' => '2025-08-18 07:03:06',
                'updated_at' => '2025-08-18 17:26:16'
            ],
            [
                'id' => 27,
                'nama_barang' => 'Domba Priangan',
                'gambar' => 'domba14.jpeg',
                'harga' => '1800000',
                'stok' => '1',
                'keterangan' => 'Jenis Kelamin: Betina,\r\nJenis: priangan,\r\nUsia: 2 tahun,\r\nBB: 29 kg',
                'created_at' => '2025-08-18 07:05:51',
                'updated_at' => '2025-08-18 17:26:43'
            ],
            [
                'id' => 28,
                'nama_barang' => 'Domba Priangan',
                'gambar' => 'domba15.jpeg',
                'harga' => '1800000',
                'stok' => '1',
                'keterangan' => 'Jenis Kelamin: Betina,\r\nJenis: priangan,\r\nUsia: 2 tahun,\r\nBB: 32 kg',
                'created_at' => '2025-08-18 07:07:59',
                'updated_at' => '2025-08-18 17:27:03'
            ],
            [
                'id' => 29,
                'nama_barang' => 'Domba Priangan',
                'gambar' => 'domba16.jpeg',
                'harga' => '1800000',
                'stok' => '1',
                'keterangan' => 'Jenis Kelamin: Betina,\r\nJenis: priangan,\r\nUsia: 2 tahun,\r\nBB: 31 kg',
                'created_at' => '2025-08-18 07:11:13',
                'updated_at' => '2025-08-18 17:27:25'
            ],
            [
                'id' => 30,
                'nama_barang' => 'Domba Merino',
                'gambar' => 'domba17.jpeg',
                'harga' => '3500000',
                'stok' => '1',
                'keterangan' => 'Jenis Kelamin: Betina,\r\nJenis: merino,\r\nUsia: 1,5 Tahun ,\r\nBB: 44 kg',
                'created_at' => '2025-08-18 07:16:04',
                'updated_at' => '2025-08-18 17:27:50'
            ],
            [
                'id' => 31,
                'nama_barang' => 'Domba Merino',
                'gambar' => 'domba18.jpeg',
                'harga' => '1500000',
                'stok' => '1',
                'keterangan' => 'Jenis Kelamin: Betina ,\r\nJenis: merino,\r\nUsia: 4 bulan,\r\nBB: 19 kg',
                'created_at' => '2025-08-18 07:18:19',
                'updated_at' => '2025-08-18 17:28:15'
            ],
            [
                'id' => 32,
                'nama_barang' => 'Kambing Jawa',
                'gambar' => 'kambing19.jpeg',
                'harga' => '2000000',
                'stok' => '1',
                'keterangan' => 'Jenis Kelamin: Betina,\r\nJenis: kambing jawa,\r\nUsia: 2 tahun,\r\nBB: 28 kg',
                'created_at' => '2025-08-18 07:21:36',
                'updated_at' => '2025-08-18 17:29:33'
            ],
            [
                'id' => 33,
                'nama_barang' => 'Domba Priangan',
                'gambar' => 'domba20.jpeg',
                'harga' => '3500000',
                'stok' => '1',
                'keterangan' => 'Jenis Kelamin: Betina,\r\nJenis: priangan,\r\nUsia: 2 tahun,\r\nBB: 34 kg',
                'created_at' => '2025-08-18 07:25:55',
                'updated_at' => '2025-08-18 17:30:00'
            ],
            [
                'id' => 38,
                'nama_barang' => 'Kambing Jawa',
                'gambar' => '1756362281_WhatsApp Image 2025-08-28 at 13.14.24.jpeg',
                'harga' => '2500000',
                'stok' => '1',
                'keterangan' => 'Jenis Kelamin: Jantan,\r\nJenis: kambing jawa,\r\nUsia: 2 tahun,\r\nBB: 31 kg',
                'created_at' => '2025-08-27 23:24:41',
                'updated_at' => '2025-08-27 23:24:41'
            ],
            [
                'id' => 39,
                'nama_barang' => 'Domba Priangan',
                'gambar' => '1756362380_WhatsApp Image 2025-08-28 at 13.15.11.jpeg',
                'harga' => '3000000',
                'stok' => '1',
                'keterangan' => 'Jenis Kelamin: Jantan,\r\nJenis: priangan,\r\nUsia: 2 tahun,\r\nBB: 36 kg',
                'created_at' => '2025-08-27 23:26:20',
                'updated_at' => '2025-08-27 23:26:20'
            ],
            [
                'id' => 40,
                'nama_barang' => 'Domba Priangan',
                'gambar' => '1756362442_WhatsApp Image 2025-08-28 at 13.16.19.jpeg',
                'harga' => '3000000',
                'stok' => '1',
                'keterangan' => 'Jenis Kelamin: Jantan,\r\nJenis: priangan,\r\nUsia: 2 tahun,\r\nBB: 34 kg',
                'created_at' => '2025-08-27 23:27:22',
                'updated_at' => '2025-08-27 23:27:22'
            ],
            [
                'id' => 41,
                'nama_barang' => 'Domba Priangan',
                'gambar' => '1756362534_WhatsApp Image 2025-08-28 at 13.16.34.jpeg',
                'harga' => '3000000',
                'stok' => '1',
                'keterangan' => 'Jenis Kelamin: Jantan,\r\nJenis: priangan,\r\nUsia: 2 tahun,\r\nBB: 33 kg',
                'created_at' => '2025-08-27 23:28:54',
                'updated_at' => '2025-08-27 23:28:54'
            ],
            [
                'id' => 42,
                'nama_barang' => 'Domba Garut',
                'gambar' => '1756362764_WhatsApp Image 2025-08-28 at 13.17.45.jpeg',
                'harga' => '3000000',
                'stok' => '1',
                'keterangan' => 'Jenis Kelamin: Jantan,\r\nJenis: garut,\r\nUsia: 2 tahun ,\r\nBB: 37 kg',
                'created_at' => '2025-08-27 23:32:44',
                'updated_at' => '2025-08-27 23:32:44'
            ],
            [
                'id' => 43,
                'nama_barang' => 'Domba Garut',
                'gambar' => '1756362844_WhatsApp Image 2025-08-28 at 13.18.05.jpeg',
                'harga' => '3000000',
                'stok' => '1',
                'keterangan' => 'Jenis Kelamin: Jantan,\r\nJenis: garut.\r\nUsia: 2 tahun,\r\nBB: 34 kg',
                'created_at' => '2025-08-27 23:34:04',
                'updated_at' => '2025-08-27 23:34:04'
            ],
            [
                'id' => 44,
                'nama_barang' => 'Domba Priangan',
                'gambar' => '1756362911_WhatsApp Image 2025-08-28 at 13.18.38.jpeg',
                'harga' => '3000000',
                'stok' => '1',
                'keterangan' => 'Jenis Kelamin: Jantan,\r\nJenis: priangan,\r\nUsia: 2 tahun,\r\nBB: 34 kg',
                'created_at' => '2025-08-27 23:35:11',
                'updated_at' => '2025-08-27 23:35:11'
            ],
            [
                'id' => 45,
                'nama_barang' => 'Domba Garut',
                'gambar' => '1756363023_WhatsApp Image 2025-08-28 at 13.19.01.jpeg',
                'harga' => '2000000',
                'stok' => '1',
                'keterangan' => 'Jenis Kelamin: Jantan,\r\nJenis: garut,\r\nUsia: 6 bulan,\r\nBB: 26 kg,',
                'created_at' => '2025-08-27 23:37:03',
                'updated_at' => '2025-08-27 23:37:03'
            ],
            [
                'id' => 46,
                'nama_barang' => 'Domba Garut',
                'gambar' => '1756363071_WhatsApp Image 2025-08-28 at 13.19.21.jpeg',
                'harga' => '2000000',
                'stok' => '1',
                'keterangan' => 'Jenis Kelamin: Jantan,\r\nJenis: garut,\r\nUsia: 5 bulan,\r\nBB: 27 kg',
                'created_at' => '2025-08-27 23:37:51',
                'updated_at' => '2025-08-27 23:37:51'
            ],
            [
                'id' => 47,
                'nama_barang' => 'Domba Garut',
                'gambar' => '1756363228_WhatsApp Image 2025-08-28 at 13.19.54.jpeg',
                'harga' => '3000000',
                'stok' => '1',
                'keterangan' => 'Jenis Kelamin: Jantan,\r\nJenis: Garut,\r\nUsia: 2thn,\r\nBB: 60kg',
                'created_at' => '2025-08-27 23:40:28',
                'updated_at' => '2025-08-27 23:40:51'
            ],
            [
                'id' => 48,
                'nama_barang' => 'Domba Garut',
                'gambar' => '1756363329_WhatsApp Image 2025-08-28 at 13.20.07.jpeg',
                'harga' => '3000000',
                'stok' => '1',
                'keterangan' => 'Jenis Kelamin: Jantan,\r\nJenis: Garut,\r\nUsia: 2,5thn,\r\nBB: 70kg',
                'created_at' => '2025-08-27 23:42:09',
                'updated_at' => '2025-08-27 23:42:09'
            ],
            [
                'id' => 49,
                'nama_barang' => 'Domba Garut',
                'gambar' => '1756363434_WhatsApp Image 2025-08-28 at 13.20.27.jpeg',
                'harga' => '3000000',
                'stok' => '1',
                'keterangan' => 'Jenis Kelamin: Jantan,\r\nJenis: Garut,\r\nUsia 3thn,\r\nBB: 65kg',
                'created_at' => '2025-08-27 23:43:25',
                'updated_at' => '2025-08-27 23:43:54'
            ],
            [
                'id' => 50,
                'nama_barang' => 'Domba Merino',
                'gambar' => '1756363525_WhatsApp Image 2025-08-28 at 13.21.22.jpeg',
                'harga' => '3500000',
                'stok' => '1',
                'keterangan' => 'Jenis Kelamin: Jantan,\r\nJenis: Merino,\r\nUsia: 9bulan,\r\nBB: 28kg',
                'created_at' => '2025-08-27 23:45:25',
                'updated_at' => '2025-08-27 23:45:25'
            ],
            [
                'id' => 51,
                'nama_barang' => 'Domba Merino',
                'gambar' => '1756363650_WhatsApp Image 2025-08-28 at 13.21.33.jpeg',
                'harga' => '3500000',
                'stok' => '1',
                'keterangan' => 'Jenis Kelamin: Jantan,\r\nJenis: Merino,\r\nUsia: 3thn,\r\nBB: 80kg',
                'created_at' => '2025-08-27 23:47:30',
                'updated_at' => '2025-08-27 23:47:30'
            ]
        ]);
    }
}
