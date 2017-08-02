<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvestmentLedgersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investment_ledgers', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date')->nullable();
            $table->string('transaction')->nullable();
            $table->string('withdraw')->nullable();
            $table->string('deposit')->nullable();
            $table->string('interest')->nullable();
            $table->string('balance')->nullable();
            $table->string('signature')->nullable();
            $table->integer('customer_id')->unsigned()->nullable();
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('investment_ledgers');
    }
}
