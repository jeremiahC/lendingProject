<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fname', 20);
            $table->string('mname', 20);
            $table->string('lname', 20);
            $table->string('home_add', 100)->nullable;
            $table->string('comp_add', 100)->nullable;
            $table->date('birthday');
            $table->bigInteger('cell_no')->unique;
            $table->string('afp_serial')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
