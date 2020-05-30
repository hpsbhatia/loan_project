<?php

use Illuminate\Support\Facades\Schema;
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
            $table->string('name')->comment('user name');
            $table->string('email')->unique()->comment('user email address');
            $table->string('password')->comment('user password');
            $table->rememberToken();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('spouse_name');
            $table->string('email_name');
            $table->string('phone_number');
            $table->string('father_name');
            $table->string('mother_name');
            $table->date('birthday');
            $table->string('present_address');
            $table->string('permanent_address');
            $table->string('emergency_name');
            $table->string('emergency_relationship');
            $table->string('emergency_address');
            $table->string('emergency_phone');
            $table->string('avatar_path');
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
        Schema::drop('users');
    }
}
