<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLedgersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ledgers', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->string('transaction')->nullable();
            $table->decimal('loan')->nullable();
            $table->decimal('amount')->nullable();
            $table->decimal('interest')->nullable();
            $table->decimal('payments')->nullable();
            $table->decimal('balance')->nullable();
            $table->decimal('received')->nullable();
            $table->integer('customer_id')->unsigned()->nullable();
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->timestamps();
        });

        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned()->nullable();
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->string('payment_for');
            $table->decimal('amount');
            $table->string('acnt_no')->nullable();
            $table->integer('ledger_id')->unsigned()->nullable();
            $table->foreign('ledger_id')->references('id')->on('ledgers');
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
        Schema::dropIfExists('ledgers');
    }
}
