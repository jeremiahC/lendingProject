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

    public function ledger(){

        return $this->hasMany(Ledger::class);

    }

    public function count(){
        $customers = DB::table('customers')->count();

        return $customers;
    }
}
