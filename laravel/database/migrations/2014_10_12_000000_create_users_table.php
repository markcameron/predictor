<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->datetime('last_seen')->nullable();
            $table->string('nickname');
            $table->string('last_name');
            $table->string('first_name');
            $table->string('email')->unique();
            $table->integer('active')->default(0);
            $table->string('password');
            $table->string('activation_code');
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
