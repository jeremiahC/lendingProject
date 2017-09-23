<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class InvestmentLedger extends Model
{
    public function findLatestId($customerId){
        $ledger = DB::table('investment_ledgers')
            ->where('customer_id', '=', $customerId)
            ->orderBy('id', 'desc')
            ->first();

        return $ledger;
    }

    public function findIdByTrans($transaction, $customerId){
        $ledger = DB::table('investment_ledgers')
            ->where([
                ['transaction', '=', $transaction],
                ['customer_id', '=', $customerId]
            ])
            ->orderBy('id', 'desc')
            ->first();

        return $ledger;
    }

}
