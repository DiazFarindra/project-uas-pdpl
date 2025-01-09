<?php

namespace Database\Seeders;

use App\Models\VA;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VASeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                'bank_name' => 'BCA',
                'number' => '3901',
            ],
            [
                'bank_name' => 'BRI',
                'number' => '88810',
            ],
            [
                'bank_name' => 'Mandiri',
                'number' => '89508',
            ],
        ])->each(function ($va) {
            VA::create($va);
        });
    }
}
