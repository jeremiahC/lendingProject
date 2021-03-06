<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Loan extends Model
{

    public function amount(){

        return $this->hasOne(LoanAmount::class);
    }

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

}
