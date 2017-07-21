<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('loans', function (Blueprint $table) {
            $table->increments('id');

            //add loan
            $table->date('date_app')->nullable();
            $table->date('date_prep')->nullable();
            $table->string('amt_app');
            $table->string('col_off', 50);
            $table->string('co_makers', 50);
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->integer('prep_by')->unsigned();
            $table->foreign('prep_by')->references('id')->on('users');
            $table->string('short_term')->nullable();
            $table->string('months_to_pay')->nullable();
            $table->timestamps();

        });

        Schema::create('amount_approved', function (Blueprint $table) {
            $table->increments('id');

            //add amount
            $table->integer('loan_id')->unsigned();
            $table->foreign('loan_id')->references('id')->on('loans');
            $table->string('amt_apr')->nullable();
            $table->string('less')->nullable();
            $table->string('interest')->nullable();
            $table->string('interest_month')->nullable();
            $table->string('serv_charge')->nullable();
            $table->string('notarial')->nullable();
            $table->string('others')->nullable();
            $table->string('prev_loan')->nullable();
            $table->string('total')->nullable();
            $table->string('gives')->nullable();
            $table->date('date_start')->nullable();
            $table->string('approved')->nullable();
            $table->string('transaction');
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
        Schema::dropIfExists('amount_approved');
        Schema::dropIfExists('loans');
    }
}
