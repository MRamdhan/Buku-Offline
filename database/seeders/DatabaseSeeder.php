<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Buku;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'user1',
            'email' => 'user1@gmail.com',
            'password' => bcrypt(1),
            'id' => 1
        ]);

        Buku::create([
            'judul' => 'Kenikmatan Surga',
            'foto' => 'img/surga.jpeg',
            'harga' => '10.000',
            'tanggal_pembelian' => '15-10-2024',
            'user_id' => 1
        ]);
    }
}
