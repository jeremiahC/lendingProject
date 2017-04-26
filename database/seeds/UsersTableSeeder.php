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
            ['name' => 'User B. User', 'email' => 'user@yahoo.com', 'password' => bcrypt('user123'), 'role_id' => 2],
            ['name' => 'Manager B. User', 'email' => 'manager@yahoo.com', 'password' => bcrypt('manager123'), 'role_id' => 3],
        ]);
    }
}
