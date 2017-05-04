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
            ['name' => 'User B. User', 'email' => 'user@yahoo.com', 'password' => bcrypt('user123')],
            ['name' => 'Manager B. User', 'email' => 'manager@yahoo.com', 'password' => bcrypt('manager123')],
            ['name' => 'Admin B. User', 'email' => 'admin@yahoo.com', 'password' => bcrypt('admin123')],
        ]);
    }
}
