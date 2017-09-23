<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LoanAmount extends Model
{
    //
    protected $table = 'amount_approved';

    public function loan(){
        return $this->belongsTo(Loan::class);
    }

    public function countAllForAppr(){
        $amount =  DB::table('amount_approved')->whereNull('approved')->count();
        return $amount;
    }

    public function countAllApproved(){
        $amounts = DB::table('amount_approved')->whereNotNull('approved')->count();

        return $amounts;
    }

    public function totalAmount(){
        $amount = DB::table('amount_approved')->sum('amt_apr');

        return $amount;
    }

}
