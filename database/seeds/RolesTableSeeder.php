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
            ['role_name' => 'ADMIN', 'description' => 'admin user'],
            ['role_name' => 'USER', 'description' => 'regular user'],
            ['role_name' => 'MANAGER', 'description' => 'manager user']
        ]);
    }
}
