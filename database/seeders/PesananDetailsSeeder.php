<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PesananDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\PesananDetail::insert([
            [
                'id' => 2,
                'barang_id' => 3,
                'pesanan_id' => 1,
                'jumlah' => 2,
                'jumlah_harga' => 100000,
                'created_at' => '2025-08-08 02:27:35',
                'updated_at' => '2025-08-08 02:27:35'
            ],
            [
                'id' => 3,
                'barang_id' => 2,
                'pesanan_id' => 2,
                'jumlah' => 2,
                'jumlah_harga' => 120000,
                'created_at' => '2025-08-08 02:56:29',
                'updated_at' => '2025-08-08 02:56:29'
            ],
            [
                'id' => 4,
                'barang_id' => 1,
                'pesanan_id' => 3,
                'jumlah' => 2,
                'jumlah_harga' => 60000000,
                'created_at' => '2025-08-08 08:20:55',
                'updated_at' => '2025-08-08 08:20:55'
            ],
            [
                'id' => 5,
                'barang_id' => 3,
                'pesanan_id' => 4,
                'jumlah' => 3,
                'jumlah_harga' => 180000000,
                'created_at' => '2025-08-08 08:21:44',
                'updated_at' => '2025-08-08 08:21:44'
            ],
            [
                'id' => 6,
                'barang_id' => 3,
                'pesanan_id' => 5,
                'jumlah' => 4,
                'jumlah_harga' => 240000000,
                'created_at' => '2025-08-08 08:22:12',
                'updated_at' => '2025-08-08 08:22:32'
            ],
            [
                'id' => 7,
                'barang_id' => 2,
                'pesanan_id' => 5,
                'jumlah' => 1,
                'jumlah_harga' => 35000000,
                'created_at' => '2025-08-08 08:22:53',
                'updated_at' => '2025-08-08 08:22:53'
            ],
            [
                'id' => 8,
                'barang_id' => 1,
                'pesanan_id' => 5,
                'jumlah' => 1,
                'jumlah_harga' => 30000000,
                'created_at' => '2025-08-08 08:23:12',
                'updated_at' => '2025-08-08 08:23:12'
            ],
            [
                'id' => 9,
                'barang_id' => 1,
                'pesanan_id' => 6,
                'jumlah' => 2,
                'jumlah_harga' => 60000000,
                'created_at' => '2025-08-11 06:02:23',
                'updated_at' => '2025-08-11 06:02:23'
            ],
            [
                'id' => 10,
                'barang_id' => 1,
                'pesanan_id' => 7,
                'jumlah' => 1,
                'jumlah_harga' => 30000000,
                'created_at' => '2025-08-12 06:26:35',
                'updated_at' => '2025-08-12 06:26:35'
            ],
            [
                'id' => 11,
                'barang_id' => 2,
                'pesanan_id' => 7,
                'jumlah' => 1,
                'jumlah_harga' => 35000000,
                'created_at' => '2025-08-12 06:26:48',
                'updated_at' => '2025-08-12 06:26:48'
            ],
            [
                'id' => 12,
                'barang_id' => 3,
                'pesanan_id' => 7,
                'jumlah' => 1,
                'jumlah_harga' => 60000000,
                'created_at' => '2025-08-12 06:27:06',
                'updated_at' => '2025-08-12 06:27:06'
            ],
            [
                'id' => 13,
                'barang_id' => 6,
                'pesanan_id' => 7,
                'jumlah' => 2,
                'jumlah_harga' => 300000,
                'created_at' => '2025-08-12 06:30:18',
                'updated_at' => '2025-08-12 06:30:18'
            ],
            [
                'id' => 14,
                'barang_id' => 5,
                'pesanan_id' => 8,
                'jumlah' => 2,
                'jumlah_harga' => 110000000,
                'created_at' => '2025-08-12 07:34:02',
                'updated_at' => '2025-08-12 07:34:02'
            ],
            [
                'id' => 15,
                'barang_id' => 34,
                'pesanan_id' => 9,
                'jumlah' => 1,
                'jumlah_harga' => 1900000,
                'created_at' => '2025-08-18 17:52:51',
                'updated_at' => '2025-08-18 17:52:51'
            ],
            [
                'id' => 16,
                'barang_id' => 34,
                'pesanan_id' => 10,
                'jumlah' => 1,
                'jumlah_harga' => 1900000,
                'created_at' => '2025-08-18 18:02:18',
                'updated_at' => '2025-08-18 18:02:18'
            ],
            [
                'id' => 17,
                'barang_id' => 34,
                'pesanan_id' => 11,
                'jumlah' => 4,
                'jumlah_harga' => 7600000,
                'created_at' => '2025-08-18 18:22:32',
                'updated_at' => '2025-08-18 18:30:08'
            ],
            [
                'id' => 18,
                'barang_id' => 34,
                'pesanan_id' => 12,
                'jumlah' => 3,
                'jumlah_harga' => 5700000,
                'created_at' => '2025-08-18 18:30:47',
                'updated_at' => '2025-08-18 18:42:50'
            ],
            [
                'id' => 19,
                'barang_id' => 34,
                'pesanan_id' => 13,
                'jumlah' => 2,
                'jumlah_harga' => 3800000,
                'created_at' => '2025-08-18 19:10:03',
                'updated_at' => '2025-08-18 19:11:06'
            ],
            [
                'id' => 20,
                'barang_id' => 34,
                'pesanan_id' => 14,
                'jumlah' => 2,
                'jumlah_harga' => 3800000,
                'created_at' => '2025-08-18 19:19:03',
                'updated_at' => '2025-08-18 19:19:03'
            ],
            [
                'id' => 21,
                'barang_id' => 34,
                'pesanan_id' => 15,
                'jumlah' => 1,
                'jumlah_harga' => 1900000,
                'created_at' => '2025-08-18 19:19:37',
                'updated_at' => '2025-08-18 19:19:37'
            ],
            [
                'id' => 22,
                'barang_id' => 34,
                'pesanan_id' => 16,
                'jumlah' => 1,
                'jumlah_harga' => 1900000,
                'created_at' => '2025-08-18 19:22:36',
                'updated_at' => '2025-08-18 19:22:36'
            ],
            [
                'id' => 23,
                'barang_id' => 34,
                'pesanan_id' => 17,
                'jumlah' => 1,
                'jumlah_harga' => 1900000,
                'created_at' => '2025-08-19 01:25:19',
                'updated_at' => '2025-08-19 01:25:19'
            ],
            [
                'id' => 24,
                'barang_id' => 34,
                'pesanan_id' => 18,
                'jumlah' => 5,
                'jumlah_harga' => 9500000,
                'created_at' => '2025-08-19 03:06:36',
                'updated_at' => '2025-08-19 03:06:36'
            ],
            [
                'id' => 25,
                'barang_id' => 34,
                'pesanan_id' => 19,
                'jumlah' => 2,
                'jumlah_harga' => 3800000,
                'created_at' => '2025-08-20 03:27:06',
                'updated_at' => '2025-08-20 03:27:06'
            ],
            [
                'id' => 26,
                'barang_id' => 37,
                'pesanan_id' => 20,
                'jumlah' => 1,
                'jumlah_harga' => 123,
                'created_at' => '2025-08-24 20:10:20',
                'updated_at' => '2025-08-24 20:10:20'
            ],
            [
                'id' => 29,
                'barang_id' => 35,
                'pesanan_id' => 21,
                'jumlah' => 30,
                'jumlah_harga' => 3690,
                'created_at' => '2025-08-24 20:32:02',
                'updated_at' => '2025-08-24 20:34:18'
            ],
            [
                'id' => 30,
                'barang_id' => 39,
                'pesanan_id' => 21,
                'jumlah' => 100,
                'jumlah_harga' => 99900,
                'created_at' => '2025-08-24 20:36:41',
                'updated_at' => '2025-08-24 20:36:41'
            ],
            [
                'id' => 31,
                'barang_id' => 39,
                'pesanan_id' => 22,
                'jumlah' => 89,
                'jumlah_harga' => 88911,
                'created_at' => '2025-08-24 20:47:42',
                'updated_at' => '2025-08-24 20:47:42'
            ],
            [
                'id' => 32,
                'barang_id' => 39,
                'pesanan_id' => 23,
                'jumlah' => 267,
                'jumlah_harga' => 266733,
                'created_at' => '2025-08-24 20:48:58',
                'updated_at' => '2025-08-24 20:48:58'
            ],
            [
                'id' => 33,
                'barang_id' => 39,
                'pesanan_id' => 24,
                'jumlah' => 67,
                'jumlah_harga' => 66933,
                'created_at' => '2025-08-24 20:50:58',
                'updated_at' => '2025-08-24 20:50:58'
            ],
            [
                'id' => 34,
                'barang_id' => 39,
                'pesanan_id' => 25,
                'jumlah' => 4,
                'jumlah_harga' => 3996,
                'created_at' => '2025-08-24 20:53:00',
                'updated_at' => '2025-08-24 20:53:00'
            ],
            [
                'id' => 35,
                'barang_id' => 39,
                'pesanan_id' => 26,
                'jumlah' => 87,
                'jumlah_harga' => 86913,
                'created_at' => '2025-08-24 21:06:38',
                'updated_at' => '2025-08-24 21:08:53'
            ],
            [
                'id' => 36,
                'barang_id' => 35,
                'pesanan_id' => 26,
                'jumlah' => 2,
                'jumlah_harga' => 246,
                'created_at' => '2025-08-24 21:09:21',
                'updated_at' => '2025-08-24 21:09:21'
            ],
            [
                'id' => 37,
                'barang_id' => 39,
                'pesanan_id' => 27,
                'jumlah' => 1,
                'jumlah_harga' => 999,
                'created_at' => '2025-08-24 21:13:06',
                'updated_at' => '2025-08-24 21:13:06'
            ],
            [
                'id' => 38,
                'barang_id' => 35,
                'pesanan_id' => 28,
                'jumlah' => 5,
                'jumlah_harga' => 615,
                'created_at' => '2025-08-24 21:14:28',
                'updated_at' => '2025-08-24 21:14:28'
            ],
            [
                'id' => 39,
                'barang_id' => 39,
                'pesanan_id' => 29,
                'jumlah' => 10,
                'jumlah_harga' => 9990,
                'created_at' => '2025-08-24 21:16:51',
                'updated_at' => '2025-08-24 21:16:51'
            ],
            [
                'id' => 40,
                'barang_id' => 35,
                'pesanan_id' => 30,
                'jumlah' => 10,
                'jumlah_harga' => 1230,
                'created_at' => '2025-08-24 21:17:31',
                'updated_at' => '2025-08-24 21:17:31'
            ],
            [
                'id' => 41,
                'barang_id' => 41,
                'pesanan_id' => 30,
                'jumlah' => 10,
                'jumlah_harga' => 10000000,
                'created_at' => '2025-08-24 23:05:20',
                'updated_at' => '2025-08-24 23:05:20'
            ],
            [
                'id' => 42,
                'barang_id' => 41,
                'pesanan_id' => 31,
                'jumlah' => 80,
                'jumlah_harga' => 80000000,
                'created_at' => '2025-08-24 23:06:39',
                'updated_at' => '2025-08-24 23:06:39'
            ],
            [
                'id' => 43,
                'barang_id' => 41,
                'pesanan_id' => 32,
                'jumlah' => 3,
                'jumlah_harga' => 3000000,
                'created_at' => '2025-08-24 23:07:54',
                'updated_at' => '2025-08-24 23:15:11'
            ],
            [
                'id' => 44,
                'barang_id' => 39,
                'pesanan_id' => 32,
                'jumlah' => 2,
                'jumlah_harga' => 1998,
                'created_at' => '2025-08-24 23:24:06',
                'updated_at' => '2025-08-24 23:24:06'
            ],
            [
                'id' => 45,
                'barang_id' => 41,
                'pesanan_id' => 33,
                'jumlah' => 2,
                'jumlah_harga' => 2000000,
                'created_at' => '2025-08-25 03:51:59',
                'updated_at' => '2025-08-25 03:51:59'
            ],
            [
                'id' => 46,
                'barang_id' => 41,
                'pesanan_id' => 34,
                'jumlah' => 12,
                'jumlah_harga' => 12000000,
                'created_at' => '2025-08-25 03:57:42',
                'updated_at' => '2025-08-25 03:57:42'
            ],
            [
                'id' => 47,
                'barang_id' => 41,
                'pesanan_id' => 35,
                'jumlah' => 12,
                'jumlah_harga' => 12000000,
                'created_at' => '2025-08-25 21:07:16',
                'updated_at' => '2025-08-25 21:07:16'
            ],
            [
                'id' => 48,
                'barang_id' => 41,
                'pesanan_id' => 36,
                'jumlah' => 12,
                'jumlah_harga' => 12000000,
                'created_at' => '2025-08-25 21:15:19',
                'updated_at' => '2025-08-25 21:15:19'
            ],
            [
                'id' => 49,
                'barang_id' => 40,
                'pesanan_id' => 37,
                'jumlah' => 1678,
                'jumlah_harga' => 1678000000,
                'created_at' => '2025-08-25 21:26:46',
                'updated_at' => '2025-08-25 21:27:18'
            ],
            [
                'id' => 50,
                'barang_id' => 42,
                'pesanan_id' => 38,
                'jumlah' => 1,
                'jumlah_harga' => 10000000,
                'created_at' => '2025-08-25 21:35:31',
                'updated_at' => '2025-08-25 21:35:31'
            ],
            [
                'id' => 51,
                'barang_id' => 14,
                'pesanan_id' => 39,
                'jumlah' => 1,
                'jumlah_harga' => 1100000,
                'created_at' => '2025-08-26 00:24:47',
                'updated_at' => '2025-08-26 00:24:47'
            ],
            [
                'id' => 52,
                'barang_id' => 18,
                'pesanan_id' => 40,
                'jumlah' => 1,
                'jumlah_harga' => 1800000,
                'created_at' => '2025-08-26 20:45:23',
                'updated_at' => '2025-08-26 20:45:23'
            ],
            [
                'id' => 53,
                'barang_id' => 14,
                'pesanan_id' => 41,
                'jumlah' => 1,
                'jumlah_harga' => 1100000,
                'created_at' => '2025-08-27 23:04:14',
                'updated_at' => '2025-08-27 23:04:14'
            ],
            [
                'id' => 54,
                'barang_id' => 14,
                'pesanan_id' => 42,
                'jumlah' => 1,
                'jumlah_harga' => 1100000,
                'created_at' => '2025-08-27 23:49:33',
                'updated_at' => '2025-08-27 23:49:33'
            ]
        ]);
    }
}
