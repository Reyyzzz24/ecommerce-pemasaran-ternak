<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::insert([
            [
                'id' => 1,
                'name' => 'Reva Yulian Satria',
                'email' => 'revayuliansatria@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$12$2NNhbJvZhDxb1Rdtl536deAwoVUK8Or8/3NoksLQbUD6dGic.xaXK',
                'alamat' => 'H.E Sukma Street',
                'nohp' => '081289768967',
                'remember_token' => 'qTYKZ9KzrEtbEOe3NA5SVuVxLra6t40TedOUz7Jewbbv2dXAabdDxtz7UlQV',
                'created_at' => '2025-08-08 02:17:07',
                'updated_at' => '2025-08-24 08:17:06',
                'role' => 'user'
            ],
            [
                'id' => 2,
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$12$SwIqE/8jCBm1bO4mKNkT7e86hw0oOfAblxKNfYRjRvCWPnSQ.rLEm',
                'alamat' => 'Kp. Cijulang, RT 03 RW 07, Desa. Sukaharja Kec. Cijeruk, Kab. Bogor',
                'nohp' => '085697461625',
                'remember_token' => null,
                'created_at' => '2025-08-12 05:35:07',
                'updated_at' => '2025-08-27 22:28:27',
                'role' => 'admin'
            ],
            [
                'id' => 3,
                'name' => 'test',
                'email' => 'test@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$12$w4QmAXF0ZFvZzmnT2zIgCewMHi1eNclr3z5KFZNM6Yv5V86LpZ0Ki',
                'alamat' => 'test',
                'nohp' => '089999999',
                'remember_token' => 'QA6ACgbSBoE8ISIqGMqOY0WSFqZkCnhlDfLZzw7q6Y4CMQ1idsPMiWpdkKi3',
                'created_at' => '2025-08-19 01:24:44',
                'updated_at' => '2025-08-25 03:54:16',
                'role' => 'user'
            ],
            [
                'id' => 4,
                'name' => 'pengguna1',
                'email' => 'pengguna1@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$10$6dfaC8E4GWFN3inK35cD5OnxCxDcKkQmvhaURO/Zxmxz.TB7CMNrS',
                'alamat' => 'test',
                'nohp' => '0899999999',
                'remember_token' => null,
                'created_at' => '2025-08-20 03:25:00',
                'updated_at' => '2025-08-20 03:28:05',
                'role' => 'user'
            ],
            [
                'id' => 5,
                'name' => 'revaaa',
                'email' => 'reva@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$12$u15CiuLpCujl8y96tdh/F.a5IBUZPbGO.Kv753ILQNdwlxdc.GYAy',
                'alamat' => 'test',
                'nohp' => '0899999999',
                'remember_token' => null,
                'created_at' => '2025-08-25 03:51:11',
                'updated_at' => '2025-08-25 03:52:52',
                'role' => 'user'
            ],
            [
                'id' => 6,
                'name' => 'asep',
                'email' => 'asep@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$12$AkmOhOAjS1c4UaenzDoXHOq9h75Au6Y4dUjks37gJu4Gy9mU/k0LW',
                'alamat' => 'test',
                'nohp' => '0899999999',
                'remember_token' => null,
                'created_at' => '2025-08-25 03:55:48',
                'updated_at' => '2025-08-25 03:58:28',
                'role' => 'user'
            ],
            [
                'id' => 7,
                'name' => 'abas@gmail.com',
                'email' => 'abas@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$12$MBATFwCiKd.UOj4V3iykauj8A1DmDEJQBIYmFltbye9j.THU74B8a',
                'alamat' => 'test',
                'nohp' => '08111111111',
                'remember_token' => null,
                'created_at' => '2025-08-25 21:06:10',
                'updated_at' => '2025-08-25 21:08:12',
                'role' => 'user'
            ],
            [
                'id' => 8,
                'name' => 'hambali',
                'email' => 'hambali@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$12$HujA2iOBmb8zn1MqDBdoZO9ZubzM1Cvi8aBSLXxJ4XDcbNpwDzkpC',
                'alamat' => 'mang ea',
                'nohp' => '0899999999',
                'remember_token' => null,
                'created_at' => '2025-08-25 21:14:28',
                'updated_at' => '2025-08-25 21:20:47',
                'role' => 'user'
            ]
        ]);
    }
}
