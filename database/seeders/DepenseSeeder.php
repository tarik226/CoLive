<?php

namespace Database\Seeders;

use App\Models\depense;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        depense::factory()->create([
            'title' => 'poulet',
            'amount' => 30,
            'colocation_id'=> 19,
            'user_id'=> 1,
            'category_id' => 2
        ]);
    }
}
