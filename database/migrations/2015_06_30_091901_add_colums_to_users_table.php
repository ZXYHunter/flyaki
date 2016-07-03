<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('username');
            $table->string('phone',30);
            $table->string('gender',30);
            $table->string('photoaddr');
            $table->string('qq',50);
            $table->longText('introduction');
            $table->text('signature');
            $table->string('university');
            $table->string('major');
            $table->string('degree');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn(['username', 'phone','gender','photoaddr','qq','introduction','signature','university','major','degree']);
        });
    }
}
