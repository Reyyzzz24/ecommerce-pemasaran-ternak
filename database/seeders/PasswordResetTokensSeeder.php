<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PasswordResetTokensSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('password_reset_tokens')->insert([
            [
                'email' => 'revayuliansatria@gmail.com',
                'token' => '$2y$12$xviFv16JiMeW.ULMDRO3M.ETj0fPMiGd94MCTr/QJMANXyW373TA.',
                'created_at' => '2025-08-27 22:05:57'
            ]
        ]);
    }
}
