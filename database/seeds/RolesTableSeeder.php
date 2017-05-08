<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['name' => 'ADMIN-USER', 'display_name' => 'Admin', 'description' => 'Admin Employee'],
            ['name' => 'REG-USER', 'display_name' => 'Regular User', 'description' => 'Regular User'],
            ['name' => 'REG-EMPLOYEE', 'display_name' => 'Regular Employee', 'description' => 'Regular Employee'],
            ['name' => 'MANAGER-USER', 'display_name' => 'Manager', 'description' => 'The Manager'],
        ]);

        DB::table('role_user')->insert([
            ['user_id' => 3, 'role_id' => 1],
            ['user_id' => 1, 'role_id' => 2],
        ]);
    }
}
