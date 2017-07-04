<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name' => 'User B. User', 'email' => 'user@rodredlending.com', 'password' => bcrypt('user123')],
            ['name' => 'Manager B. User', 'email' => 'manager@rodredlending.com', 'password' => bcrypt('manager123')],
            ['name' => 'Admin B. User', 'email' => 'admin@rodredlending.com', 'password' => bcrypt('admin123')],
        ]);
    }
}
