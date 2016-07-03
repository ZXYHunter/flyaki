<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('consultant', function($table)
        {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('certification',100);
            $table->integer('photoalbum_id')->nullable();
            $table->text('services');
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
        Schema::dropIfExists('consultant');
    }
}
