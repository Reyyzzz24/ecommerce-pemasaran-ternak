<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PesanansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Pesanan::insert([
            [
                'id' => 1,
                'user_id' => 1,
                'tanggal' => '2025-08-08',
                'status' => '1',
                'kode' => 926,
                'jumlah_harga' => 100000,
                'created_at' => '2025-08-08 02:24:25',
                'updated_at' => '2025-08-08 02:38:17'
            ],
            [
                'id' => 2,
                'user_id' => 1,
                'tanggal' => '2025-08-08',
                'status' => '1',
                'kode' => 812,
                'jumlah_harga' => 120000,
                'created_at' => '2025-08-08 02:56:29',
                'updated_at' => '2025-08-08 02:56:34'
            ],
            [
                'id' => 3,
                'user_id' => 1,
                'tanggal' => '2025-08-08',
                'status' => '1',
                'kode' => 427,
                'jumlah_harga' => 60000000,
                'created_at' => '2025-08-08 08:20:55',
                'updated_at' => '2025-08-08 08:21:10'
            ],
            [
                'id' => 4,
                'user_id' => 1,
                'tanggal' => '2025-08-08',
                'status' => '1',
                'kode' => 381,
                'jumlah_harga' => 180000000,
                'created_at' => '2025-08-08 08:21:44',
                'updated_at' => '2025-08-08 08:21:51'
            ],
            [
                'id' => 5,
                'user_id' => 1,
                'tanggal' => '2025-08-08',
                'status' => '1',
                'kode' => 824,
                'jumlah_harga' => 305000000,
                'created_at' => '2025-08-08 08:22:12',
                'updated_at' => '2025-08-08 08:23:21'
            ],
            [
                'id' => 6,
                'user_id' => 1,
                'tanggal' => '2025-08-11',
                'status' => '1',
                'kode' => 174,
                'jumlah_harga' => 60000000,
                'created_at' => '2025-08-11 06:02:22',
                'updated_at' => '2025-08-11 06:03:06'
            ],
            [
                'id' => 7,
                'user_id' => 2,
                'tanggal' => '2025-08-12',
                'status' => '1',
                'kode' => 638,
                'jumlah_harga' => 125300000,
                'created_at' => '2025-08-12 06:26:35',
                'updated_at' => '2025-08-12 06:35:44'
            ],
            [
                'id' => 8,
                'user_id' => 2,
                'tanggal' => '2025-08-12',
                'status' => '1',
                'kode' => 726,
                'jumlah_harga' => 110000000,
                'created_at' => '2025-08-12 07:34:02',
                'updated_at' => '2025-08-12 07:34:07'
            ],
            [
                'id' => 9,
                'user_id' => 2,
                'tanggal' => '2025-08-19',
                'status' => '1',
                'kode' => 606,
                'jumlah_harga' => 1900000,
                'created_at' => '2025-08-18 17:52:51',
                'updated_at' => '2025-08-18 17:53:01'
            ],
            [
                'id' => 10,
                'user_id' => 2,
                'tanggal' => '2025-08-19',
                'status' => '1',
                'kode' => 159,
                'jumlah_harga' => 1900000,
                'created_at' => '2025-08-18 18:02:17',
                'updated_at' => '2025-08-18 18:02:33'
            ],
            [
                'id' => 11,
                'user_id' => 2,
                'tanggal' => '2025-08-19',
                'status' => '1',
                'kode' => 875,
                'jumlah_harga' => 7600000,
                'created_at' => '2025-08-18 18:22:30',
                'updated_at' => '2025-08-18 18:30:17'
            ],
            [
                'id' => 12,
                'user_id' => 2,
                'tanggal' => '2025-08-19',
                'status' => '1',
                'kode' => 276,
                'jumlah_harga' => 5700000,
                'created_at' => '2025-08-18 18:30:47',
                'updated_at' => '2025-08-18 18:42:59'
            ],
            [
                'id' => 13,
                'user_id' => 2,
                'tanggal' => '2025-08-19',
                'status' => '1',
                'kode' => 795,
                'jumlah_harga' => 3800000,
                'created_at' => '2025-08-18 19:09:59',
                'updated_at' => '2025-08-18 19:11:24'
            ],
            [
                'id' => 14,
                'user_id' => 2,
                'tanggal' => '2025-08-19',
                'status' => '1',
                'kode' => 377,
                'jumlah_harga' => 3800000,
                'created_at' => '2025-08-18 19:19:03',
                'updated_at' => '2025-08-18 19:19:14'
            ],
            [
                'id' => 15,
                'user_id' => 2,
                'tanggal' => '2025-08-19',
                'status' => '1',
                'kode' => 775,
                'jumlah_harga' => 1900000,
                'created_at' => '2025-08-18 19:19:03',
                'updated_at' => '2025-08-18 19:19:44'
            ],
            [
                'id' => 16,
                'user_id' => 2,
                'tanggal' => '2025-08-19',
                'status' => '1',
                'kode' => 518,
                'jumlah_harga' => 1900000,
                'created_at' => '2025-08-18 19:22:36',
                'updated_at' => '2025-08-18 19:22:51'
            ],
            [
                'id' => 17,
                'user_id' => 3,
                'tanggal' => '2025-08-19',
                'status' => '1',
                'kode' => 993,
                'jumlah_harga' => 1900000,
                'created_at' => '2025-08-19 01:25:19',
                'updated_at' => '2025-08-19 01:26:08'
            ],
            [
                'id' => 18,
                'user_id' => 2,
                'tanggal' => '2025-08-19',
                'status' => '1',
                'kode' => 951,
                'jumlah_harga' => 9500000,
                'created_at' => '2025-08-19 03:06:36',
                'updated_at' => '2025-08-19 03:06:43'
            ],
            [
                'id' => 19,
                'user_id' => 4,
                'tanggal' => '2025-08-20',
                'status' => '1',
                'kode' => 113,
                'jumlah_harga' => 3800000,
                'created_at' => '2025-08-20 03:27:05',
                'updated_at' => '2025-08-20 03:28:21'
            ],
            [
                'id' => 20,
                'user_id' => 2,
                'tanggal' => '2025-08-25',
                'status' => '1',
                'kode' => 217,
                'jumlah_harga' => 123,
                'created_at' => '2025-08-24 20:10:19',
                'updated_at' => '2025-08-24 20:10:48'
            ],
            [
                'id' => 21,
                'user_id' => 2,
                'tanggal' => '2025-08-25',
                'status' => '1',
                'kode' => 296,
                'jumlah_harga' => 103590,
                'created_at' => '2025-08-24 20:18:58',
                'updated_at' => '2025-08-24 20:41:35'
            ],
            [
                'id' => 22,
                'user_id' => 2,
                'tanggal' => '2025-08-25',
                'status' => '1',
                'kode' => 805,
                'jumlah_harga' => 88911,
                'created_at' => '2025-08-24 20:47:41',
                'updated_at' => '2025-08-24 20:47:59'
            ],
            [
                'id' => 23,
                'user_id' => 2,
                'tanggal' => '2025-08-25',
                'status' => '1',
                'kode' => 791,
                'jumlah_harga' => 266733,
                'created_at' => '2025-08-24 20:48:58',
                'updated_at' => '2025-08-24 20:49:05'
            ],
            [
                'id' => 24,
                'user_id' => 2,
                'tanggal' => '2025-08-25',
                'status' => '1',
                'kode' => 576,
                'jumlah_harga' => 66933,
                'created_at' => '2025-08-24 20:50:58',
                'updated_at' => '2025-08-24 20:51:13'
            ],
            [
                'id' => 25,
                'user_id' => 2,
                'tanggal' => '2025-08-25',
                'status' => '1',
                'kode' => 735,
                'jumlah_harga' => 3996,
                'created_at' => '2025-08-24 20:53:00',
                'updated_at' => '2025-08-24 20:53:10'
            ],
            [
                'id' => 26,
                'user_id' => 2,
                'tanggal' => '2025-08-25',
                'status' => '1',
                'kode' => 583,
                'jumlah_harga' => 87159,
                'created_at' => '2025-08-24 21:06:38',
                'updated_at' => '2025-08-24 21:09:29'
            ],
            [
                'id' => 27,
                'user_id' => 2,
                'tanggal' => '2025-08-25',
                'status' => '1',
                'kode' => 743,
                'jumlah_harga' => 999,
                'created_at' => '2025-08-24 21:13:06',
                'updated_at' => '2025-08-24 21:13:12'
            ],
            [
                'id' => 28,
                'user_id' => 2,
                'tanggal' => '2025-08-25',
                'status' => '1',
                'kode' => 712,
                'jumlah_harga' => 615,
                'created_at' => '2025-08-24 21:14:27',
                'updated_at' => '2025-08-24 21:14:41'
            ],
            [
                'id' => 29,
                'user_id' => 2,
                'tanggal' => '2025-08-25',
                'status' => '1',
                'kode' => 895,
                'jumlah_harga' => 9990,
                'created_at' => '2025-08-24 21:16:51',
                'updated_at' => '2025-08-24 21:17:02'
            ],
            [
                'id' => 30,
                'user_id' => 2,
                'tanggal' => '2025-08-25',
                'status' => '1',
                'kode' => 141,
                'jumlah_harga' => 10001230,
                'created_at' => '2025-08-24 21:17:30',
                'updated_at' => '2025-08-24 23:05:41'
            ],
            [
                'id' => 31,
                'user_id' => 2,
                'tanggal' => '2025-08-25',
                'status' => '1',
                'kode' => 852,
                'jumlah_harga' => 80000000,
                'created_at' => '2025-08-24 23:06:39',
                'updated_at' => '2025-08-24 23:06:57'
            ],
            [
                'id' => 32,
                'user_id' => 2,
                'tanggal' => '2025-08-25',
                'status' => '1',
                'kode' => 164,
                'jumlah_harga' => 3001998,
                'created_at' => '2025-08-24 23:07:53',
                'updated_at' => '2025-08-24 23:34:55'
            ],
            [
                'id' => 33,
                'user_id' => 5,
                'tanggal' => '2025-08-25',
                'status' => '0',
                'kode' => 675,
                'jumlah_harga' => 2000000,
                'created_at' => '2025-08-25 03:51:59',
                'updated_at' => '2025-08-25 03:51:59'
            ],
            [
                'id' => 34,
                'user_id' => 6,
                'tanggal' => '2025-08-25',
                'status' => '1',
                'kode' => 123,
                'jumlah_harga' => 12000000,
                'created_at' => '2025-08-25 03:57:42',
                'updated_at' => '2025-08-25 21:02:57'
            ],
            [
                'id' => 35,
                'user_id' => 7,
                'tanggal' => '2025-08-26',
                'status' => '1',
                'kode' => 498,
                'jumlah_harga' => 12000000,
                'created_at' => '2025-08-25 21:07:13',
                'updated_at' => '2025-08-25 21:08:30'
            ],
            [
                'id' => 36,
                'user_id' => 8,
                'tanggal' => '2025-08-26',
                'status' => '1',
                'kode' => 412,
                'jumlah_harga' => 12000000,
                'created_at' => '2025-08-25 21:15:18',
                'updated_at' => '2025-08-25 21:21:10'
            ],
            [
                'id' => 37,
                'user_id' => 10,
                'tanggal' => '2025-08-26',
                'status' => '1',
                'kode' => 560,
                'jumlah_harga' => 1678000000,
                'created_at' => '2025-08-25 21:26:44',
                'updated_at' => '2025-08-25 21:29:43'
            ],
            [
                'id' => 38,
                'user_id' => 2,
                'tanggal' => '2025-08-26',
                'status' => '1',
                'kode' => 487,
                'jumlah_harga' => 10000000,
                'created_at' => '2025-08-25 21:35:31',
                'updated_at' => '2025-08-25 21:35:45'
            ],
            [
                'id' => 39,
                'user_id' => 2,
                'tanggal' => '2025-08-27',
                'status' => '1',
                'kode' => 151,
                'jumlah_harga' => 1800000,
                'created_at' => '2025-08-26 20:45:21',
                'updated_at' => '2025-08-27 22:22:59'
            ],
            [
                'id' => 40,
                'user_id' => 2,
                'tanggal' => '2025-08-28',
                'status' => '1',
                'kode' => 197,
                'jumlah_harga' => 1100000,
                'created_at' => '2025-08-27 23:04:14',
                'updated_at' => '2025-08-27 23:04:28'
            ],
            [
                'id' => 41,
                'user_id' => 2,
                'tanggal' => '2025-08-28',
                'status' => '1',
                'kode' => 697,
                'jumlah_harga' => 1100000,
                'created_at' => '2025-08-27 23:49:32',
                'updated_at' => '2025-08-27 23:49:40'
            ],
            [
                'id' => 42,
                'user_id' => 2,
                'tanggal' => '2025-08-28',
                'status' => '1',
                'kode' => 151,
                'jumlah_harga' => 1100000,
                'created_at' => '2025-08-27 23:49:32',
                'updated_at' => '2025-08-27 23:49:40'
            ]
        ]);
    }
}
