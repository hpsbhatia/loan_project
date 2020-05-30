<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('status');
            $table->string('description');
            $table->unsignedInteger('user_id')->comment('send user');
            $table->unsignedInteger('role_id')->comment('send user with role');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('No Action');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('No Action');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}
