<?php

use App\RiderRole;
use Illuminate\Database\Seeder;

class RiderRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RiderRole::firstOrCreate(['role' => 'Sprinter']);
        RiderRole::firstOrCreate(['role' => 'Climber']);
        RiderRole::firstOrCreate(['role' => 'Domestique']);
        RiderRole::firstOrCreate(['role' => 'Leader']);
    }
}
