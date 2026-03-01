<?php

namespace Database\Seeders;

use App\Models\settlement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettlementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        settlement::factory()->create([
            'depense_id'=>9,
            'user_id'=> 4,
            'amount' => 30
        ]);
    }
}
