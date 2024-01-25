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

            $user = new User();
            $user->name = 'Kasir1';
            $user->email = 'kasir1@a.com';
            $user->password = bcrypt(1);
            $user->save();

        Buku::create([
            'judul' => 'Kenikmatan Surga',
            'foto' => 'img/surga.jpeg',
            'harga' => '10.000',
            'tanggal_pembelian' => '15-10-2024',
            'user_id' => 1
        ]);
    }
}
