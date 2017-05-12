<?php

use Illuminate\Database\Seeder;

class LoansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 20; $i++){
            $int= rand(1262055681,1494317514);
            $string = date("Y-m-d",$int);

            $amount = rand(100000,200000);

            DB::table('loans')->insert([
                ['date_app' => $string, 'date_prep' => $string, 'amt_app' => $amount, 'col_off' => 'atm', 'co_makers' => str_random(5), 'customer_id' => $i, 'prep_by' => 1],
            ]);
        }

    }
}
