<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class InvestAmount extends Model
{
    protected $table = 'investment_approved';

    public function investment(){
        return $this->belongsTo(Investments::class);
    }

    public function countAllForAppr(){
        $amount =  DB::table('investment_approved')->whereNull('approved')->count();
        return $amount;
    }

    public function countAllApproved(){
        $amounts = DB::table('investment_approved')->whereNotNull('approved')->count();

        return $amounts;
    }

    public function totalAmount(){
        $amount = DB::table('investment_approved')->sum('amt_apr');

        return $amount;
    }
}
