<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                'name' => 'Laptop',
                'quantity' => 10,
                'price' => 10000000,
            ],
            [
                'name' => 'Mouse',
                'quantity' => 20,
                'price' => 100000,
            ],
            [
                'name' => 'Keyboard',
                'quantity' => 15,
                'price' => 200000,
            ],
            [
                'name' => 'Monitor',
                'quantity' => 5,
                'price' => 5000000,
            ],
        ])->each(function ($item) {
            \App\Models\Item::create($item);
        });
    }
}
