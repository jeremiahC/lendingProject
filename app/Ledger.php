<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ledger extends Model
{

    public function payment(){

        return $this->hasOne(Payment::class);

    }

    public function findLatestId($customerId){
        $ledger = DB::table('ledgers')
                    ->where('customer_id', '=', $customerId)
                    ->orderBy('id', 'desc')
                    ->first();

        return $ledger;
    }

    public function findIdByTrans($transaction, $customerId){
        $ledger = DB::table('ledgers')
            ->where([
                ['transaction', '=', $transaction],
                ['customer_id', '=', $customerId]
            ])
            ->orderBy('id', 'desc')
            ->first();

        return $ledger;
    }


}
