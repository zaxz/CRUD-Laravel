<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Product::factory()->create([
            'nama' => 'Americano Iced',
            'gambar' => 'Americano Iced.jpg',
            'harga' => '21000',
            'deskripsi' => 'Espresso shoot yang dicampur dengan segelas air menghadirkan karakter, aroma, dan rasa yang ideal.',
            'stock' => '25',
        ]);
    }
}
