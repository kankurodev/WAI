<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWinnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('winners', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('entrant');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('gender');
            $table->integer('age');
            $table->string('status');
            $table->timestamps();

            //Create foreign key for matching emails
            $table->foreign('email')->references('email')->on('entrants');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('winners');
    }
}
