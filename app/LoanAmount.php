<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoanAmount extends Model
{
    //
    protected $table = 'amount_approved';

    public function loan(){
        return $this->belongsTo(Loan::class);
    }

}
