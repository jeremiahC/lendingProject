<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            ['name' => 'edit_basic', 'display_name' => 'edit basic info'],
            ['name' => 'add_customer', 'display_name' => 'add customer'],
            ['name' => 'add_loan', 'display_name' => 'add loan'],
            ['name' => 'pay_loan', 'display_name' => 'pay loan'],
            ['name' => 'appr_loan', 'display_name' => 'approve loan'],
            ['name' => 'disappr_loan', 'display_name' => 'disapprove loan'],
            ['name' => 'add_role', 'display_name' => 'add role'],
            ['name' => 'assign_role', 'display_name' => 'assign role'],
            ['name' => 'dash_page', 'display_name' => 'Dashboard Page'],
            ['name' => 'customer_page', 'display_name' => 'Customer Page'],
            ['name' => 'file_manager_page', 'display_name' => 'File Manager Page'],
            ['name' => 'add_loan_page', 'display_name' => 'Add Loan Page'],
            ['name' => 'appr_loan_page', 'display_name' => 'Approve Loan Page'],
            ['name' => 'loan_page', 'display_name' => 'Loan Page'],
            ['name' => 'user_prof_page', 'display_name' => 'User Profile Page'],
            ['name' => 'pass_page', 'display_name' => 'Password Page'],
            ['name' => 'user_list_page', 'display_name' => 'User List Page'],
            ['name' => 'role_prev_page', 'display_name' => 'Roles Prev Page'],
        ]);

        DB::table('permission_role')->insert([
            ['permission_id' => 7, 'role_id' => 1],
            ['permission_id' => 8, 'role_id' => 1],
            ['permission_id' => 9, 'role_id' => 1],
            ['permission_id' => 15, 'role_id' => 1],
            ['permission_id' => 16, 'role_id' => 1],
            ['permission_id' => 17, 'role_id' => 1],
            ['permission_id' => 18, 'role_id' => 1],
            ['permission_id' => 15, 'role_id' => 2],
            ['permission_id' => 16, 'role_id' => 2],
            ['permission_id' => 1, 'role_id' => 3],
            ['permission_id' => 2, 'role_id' => 3],
            ['permission_id' => 3, 'role_id' => 3],
            ['permission_id' => 4, 'role_id' => 3],
            ['permission_id' => 9, 'role_id' => 3],
            ['permission_id' => 10, 'role_id' => 3],
            ['permission_id' => 12, 'role_id' => 3],
            ['permission_id' => 13, 'role_id' => 3],
            ['permission_id' => 14, 'role_id' => 3],
            ['permission_id' => 5, 'role_id' => 4],
            ['permission_id' => 6, 'role_id' => 4],
            ['permission_id' => 9, 'role_id' => 4],
            ['permission_id' => 10, 'role_id' => 4],
            ['permission_id' => 11, 'role_id' => 4],
            ['permission_id' => 13, 'role_id' => 4],
            ['permission_id' => 14, 'role_id' => 4],
        ]);
    }
}
