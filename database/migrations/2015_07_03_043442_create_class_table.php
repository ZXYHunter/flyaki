<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('class', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->text('type');
            $table->integer('consultant_id');
            $table->string('status',50);
            $table->integer('student_id');
            $table->double('price',10,2);
            $table->dateTime('starttime');
            $table->text('introduction');
            $table->text('comment');
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
        //
        Schema::dropIfExists('class');
    }
}
