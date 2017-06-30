<?php

namespace App\Console\Commands;

use App\Customer;
use App\Ledger;
use Carbon\Carbon;
use DateTime;
use Illuminate\Console\Command;

class CustomerImportCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'customer:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'import customer csv data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if (($handle = fopen(public_path() .'/Customer.csv' ,'r')) !== FALSE)
        {
            while (($data = fgetcsv($handle, 1000, ',')) !==FALSE)
            {

                $customerData = new Customer();

                $originalDate = $data[5];
                $newDate = date("Y-m-d", strtotime($originalDate));
                $customerData->lname  = $data[0];
                $customerData->fname  = $data[1];
                $customerData->mname  = $data[2];
                $customerData->home_add  = $data[3];
                $customerData->comp_add  = $data[4];
                $customerData->birthday  = $newDate;
                $customerData->cell_no  = $data[6];
                $customerData->afp_serial  = $data[7];
                $customerData->save();
            }
            fclose($handle);

            $this->line('successfully imported');
        }
    }
}
