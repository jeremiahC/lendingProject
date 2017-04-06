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
            $table->integer('amt_app');
            $table->string('col_off', 50);
            $table->string('co_makers', 50);
            $table->integer('loaned_by')->unsigned();
            $table->foreign('loaned_by')->references('id')->on('customers');
            $table->integer('prep_by')->unsigned();
            $table->foreign('prep_by')->references('id')->on('employees');



        });

        Schema::create('amount_approved', function (Blueprint $table) {
            $table->increments('id');

            //add amount
            $table->integer('loan_id')->references('id')->on('loans');
            $table->decimal('amt_apr')->nullabele();
            $table->decimal('less')->nullable();
            $table->decimal('interest')->nullabele();
            $table->decimal('serv_charge')->nullable();
            $table->decimal('notarial')->nullable();
            $table->decimal('others')->nullable();
            $table->decimal('prev_loan')->nullable();
            $table->decimal('total')->nullabele();
            $table->date('approved');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loans');
        Schema::dropIfExists('amount_approved');
    }
}
