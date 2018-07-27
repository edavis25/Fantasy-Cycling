<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DevUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'     => 'Eric',
            'email'    => 'eric@email.com',
            'password' => bcrypt('password'),
            'is_admin' => true,
        ]);
    }
}
