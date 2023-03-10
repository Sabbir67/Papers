<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('keywards');
            $table->text('abstract');
            $table->date('jdate');
            $table->string('a1fname');
            $table->string('a1lname');
            $table->string('student_id');
            $table->string('department');
            $table->string('session');
            $table->string('year');
            $table->timestamps();
            $table->unsignedBigInteger('category_id');
            //$table->unsignedBigInteger('category_id');

            $table->foreign('category_id')->references('id')->on('categories');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('journals');
    }
};
