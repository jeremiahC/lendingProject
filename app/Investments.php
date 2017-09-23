<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Investments extends Model
{
    public function amount(){

        return $this->hasOne(InvestAmount::class);
    }

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

}
