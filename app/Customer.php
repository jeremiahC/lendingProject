<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $timestamps = false;

    public function loan(){

        return $this->hasMany(Loan::class);

    }

    public function loans(){

        return $this->hasManyThrough(LoanAmount::class,Loan::class);

    }

    public function ledger(){

        return $this->hasMany(Ledger::class);

    }
}
