<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('message', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->integer('sender');
            $table->integer('receiver');
            $table->string('title',50);
            $table->longText('content');
            $table->dateTime('sendtime');
            $table->string('type',50);
            $table->string('state',30);
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
        Schema::dropIfExists('message');
    }
}
