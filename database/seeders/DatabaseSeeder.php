<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\produk;
use App\Models\Soal;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory()->create([
            'username'=>'user'
        ]);

        $kategori = Kategori::create([
            'nama'=>'minuman'
        ]);

        $kategori = Kategori::create([
            'nama'=>'makanan'
        ]);

        produk::create([
            'nama'=>'Janji Jiwa',
            'harga'=>'10000',
            'deskripsi'=>'minuman enak soy',
            'kategori_id'=>'2'
        ]);

        produk::create([
            'nama'=>'Fried Chicken',
            'harga'=>'10000',
            'deskripsi'=>'makanan enak soy',
            'kategori_id'=>'1'
        ]);
    }
}
