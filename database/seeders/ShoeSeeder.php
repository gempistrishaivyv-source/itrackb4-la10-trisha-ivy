<?php

namespace Database\Seeders;

use App\Models\Shoe;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ShoeSeeder extends Seeder
{
    public function run(): void
    {
        $sneakers = Category::create(['name' => 'Sneakers']);
        $casual = Category::create(['name' => 'Casual']);
        $running = Category::create(['name' => 'Running']);

        Shoe::create([
            'name' => 'Air Force 1',
            'brand' => 'Nike',
            'category_id' => $sneakers->id,
            'price' => 5495,
        ]);

        Shoe::create([
            'name' => 'Chuck Taylor All Star',
            'brand' => 'Converse',
            'category_id' => $casual->id,
            'price' => 3990,
        ]);

        Shoe::create([
            'name' => 'Suede Classic',
            'brand' => 'Puma',
            'category_id' => $sneakers->id,
            'price' => 4200,
        ]);

        Shoe::create([
            'name' => 'Old Skool',
            'brand' => 'Vans',
            'category_id' => $casual->id,
            'price' => 3995,
        ]);

        Shoe::create([
            'name' => 'Gel-Kayano 30',
            'brand' => 'ASICS',
            'category_id' => $running->id,
            'price' => 8990,
        ]);
    }
}