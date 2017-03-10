<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddLoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lp_add_loan', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date_app');
            $table->date('date_prep');
            $table->integer('afp_serial');
            $table->integer('amt_app');
            $table->string('col_off', 50);
            $table->string('co_makers', 50);
            $table->integer('prep_by')->unsigned();
            $table->foreign('prep_by')->references('id')->on('lp_customers');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lp_add_loan');
    }
}
