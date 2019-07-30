<?php

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
        // $this->call(UsersTableSeeder::class);
        if (app()->environment() == 'local') {
            $this->call(DevUserSeeder::class);
        }
        $this->call(RiderRolesSeeder::class);
        $this->call(StageScoringCategoriesSeeder::class);
    }
}
