<?php

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 20; $i++){

            $int= rand(1000000000,1262055681);
            $string = date("Y-m-d",$int);

            $number =  9 . rand(100000000, 200000000);

            DB::table('customers')->insert([
                ['fname' => str_random(10), 'mname' => str_random(10), 'lname' => str_random(10), 'home_add' => str_random(10), 'comp_add' => str_random(10), 'birthday' => $string, 'cell_no' => $number],
            ]);
        }
    }
}
