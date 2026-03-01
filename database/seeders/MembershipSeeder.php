<?php

namespace Database\Seeders;

use App\Models\Membership;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MembershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Membership::factory()->create([
            'type' => 'member',
            'joined_at' => now(),
            'token' => 'fgtfklkjlkijuhg543',
            'status' => 'active',
            'colocation_id' => 21,
            'user_id' => 6
        ]);

    }
}
