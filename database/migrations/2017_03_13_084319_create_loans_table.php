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
            $table->date('date_app')->nullable();
            $table->date('date_prep')->nullable();
            $table->integer('afp_serial');
            $table->integer('amt_app');
            $table->string('col_off', 50);
            $table->string('co_makers', 50);
            $table->integer('prep_by')->unsigned();
            $table->foreign('prep_by')->references('id')->on('customers');
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
        Schema::dropIfExists('loans');
    }
}
