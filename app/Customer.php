<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Customer extends Model
{

    public function loan(){

        return $this->hasMany(Loan::class);

    }

    public function loans(){

        return $this->hasManyThrough(LoanAmount::class,Loan::class);

    }

    public function investment(){

        return $this->hasMany(Loan::class);

    }

    public function investments(){

        return $this->hasManyThrough(InvestAmount::class,Investments::class);

    }

    public function ledger(){

        return $this->hasMany(Ledger::class);

    }

    public function invledger(){

        return $this->hasMany(InvestmentLedger::class);

    }

    public function count(){
        $customers = DB::table('customers')->count();

        return $customers;
    }

    public function findIdByName($lname, $fname){
        $ledger = Db::table('customers')
            ->where([
                ['lname', '=', $lname],
                ['fname', '=', $fname],
            ])
            ->get();

        foreach ($ledger as $ledge){
            return $ledge->id;
        }
    }

    public function findFirstId($customerId){
        $ledger = DB::table('ledgers')
            ->where('customer_id', '=', $customerId)
            ->first();

        return $ledger;
    }

    public function findFirstInvId($customerId){
        $ledger = DB::table('investment_ledgers')
            ->where('customer_id', '=', $customerId)
            ->first();

        return $ledger;
    }

}
