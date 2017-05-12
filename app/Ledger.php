<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ledger extends Model
{

    public function payment(){

        return $this->hasOne(Payment::class);

    }
}
