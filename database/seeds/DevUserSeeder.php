<?php

use App\User;
use Illuminate\Database\Seeder;

class DevUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::firstOrNew(['email' => 'admin@email.com']);
        $user->name = 'Admin';
        $user->password = bcrypt('password');
        $user->is_admin = true;
        $user->save();
    }
}
