<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Employees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('ide');
            $table->string('name', 50);
            $table->string('lastname', 50);
            $table->string('email', 40);
            $table->string('phone', 9);
            $table->string('gender', 1);
            $table->string('description', 50);
            $table->string('age', 2);
            $table->integer('salary'); 
            $table->integer('idd')->unsigned();
            $table->foreign('idd')->references('idd')->on('departments');

            $table->rememberToken();
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
        Schema::drop('employees');
    }
}
