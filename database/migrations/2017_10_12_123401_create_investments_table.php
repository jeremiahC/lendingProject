<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvestmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investments', function (Blueprint $table) {
            $table->increments('id');

            //add loan
            $table->date('date_app')->nullable();
            $table->date('date_prep')->nullable();
            $table->string('amt_app');
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->integer('prep_by')->unsigned();
            $table->foreign('prep_by')->references('id')->on('users');
            $table->timestamps();

        });

        Schema::create('investment_approved', function (Blueprint $table) {
            $table->increments('id');

            //add amount
            $table->integer('investments_id')->unsigned();
            $table->foreign('investments_id')->references('id')->on('investments');
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
        Schema::dropIfExists('investment_approved');
        Schema::dropIfExists('investments');
    }
}
