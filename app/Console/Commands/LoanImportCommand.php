<?php

namespace App\Console\Commands;

use App\Customer;
use App\Ledger;
use App\Loan;
use App\LoanAmount;
use Illuminate\Console\Command;

class LoanImportCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'loan:import {filename}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        if (($handle = fopen(public_path() .'/' . $this->argument('filename') ,'r')) !== FALSE)
        {
            while (($data = fgetcsv($handle, 1000, ',')) !==FALSE)
            {
                if($this->argument('filename') === "loanSheet.csv") {
                    $ledgerData = new Ledger();
                    $customer = new Customer();

                    if ($data[0] !== ""){
                        $originalDate = $data[0];
                        $newDate = date("Y-m-d", strtotime($originalDate));
                    }else{
                        $newDate = null;
                    }

                    $ledgerData->date = $newDate;
                    $ledgerData->transaction = $data[1];
                    $ledgerData->loan = $data[2];
                    $ledgerData->amount = $data[3];
                    $ledgerData->interest = $data[4];
                    $ledgerData->payments = $data[5];
                    $ledgerData->balance = $data[6];
                    $ledgerData->received = $data[7];
                    $ledgerData->approved = $data[8];
                    $ledgerData->gives = $data[9];
                    $ledgerData->withdraw = $data[10];
                    $ledgerData->deduction = $data[11];
                    $ledgerData->net = $data[12];
                    $ledgerData->customer_id = $customer->findIdByName($data[13], $data[14]);
                    $ledgerData->save();
                }elseif ($this->argument('filename') === "loanApplied.csv"){

                    $loanData = new Loan();
                    $loanApprData = new LoanAmount();
                    $customer = new Customer();

                    $customerId = $customer->findIdByName($data[20], $data[21]);

                    $originalDateApp = $data[0];
                    $newDateApp = date("Y-m-d", strtotime($originalDateApp));

                    $originalDatePrep = $data[1];
                    $newDatePrep = date("Y-m-d", strtotime($originalDatePrep));

                    $loanData->date_app = $newDateApp;
                    $loanData->date_prep = $newDatePrep;
                    $loanData->amt_app = intval($data[2]);
                    $loanData->col_off = $data[3];
                    $loanData->co_makers = $data[4];
                    $loanData->prep_by = $data[5];
                    $loanData->short_term = $data[6];
                    $loanData->months_to_pay = $data[7];
                    $loanData->customer_id = $customerId;
                    $loanData->save();

                    $originalDateStart = $data[17];
                    $newDateStart = date("Y-m-d", strtotime($originalDateStart));

                    $loanApprData->amt_apr = floatval($data[8]);
                    $loanApprData->less = floatval($data[9]);
                    $loanApprData->interest  = floatval($data[10]);
                    $loanApprData->serv_charge = floatval($data[11]);
                    $loanApprData->notarial = floatval($data[12]);
                    $loanApprData->others = floatval($data[13]);
                    $loanApprData->prev_loan = floatval($data[14]);
                    $loanApprData->total = floatval($data[15]);
                    $loanApprData->gives = floatval($data[16]);
                    $loanApprData->date_start = $newDateStart;
                    $loanApprData->approved = $data[18];
                    $loanApprData->transaction = $data[19];
                    $loanApprData->loan_id = $loanData->id;
                    $loanApprData->save();

                }else{
                    $this->line('no file inputed');
                }

            }

            fclose($handle);

            $this->line('successfully imported');
        }
    }
}
