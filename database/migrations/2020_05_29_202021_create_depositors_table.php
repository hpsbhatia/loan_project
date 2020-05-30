<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepositorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depositors', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->comment('depositor is user and borrower uses user information');
            $table->unsignedInteger('staff_id')->comment('depositor connect staff');
            $table->string('number');
            $table->string('image');
            $table->string('nid_image');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('No Action');
            $table->foreign('staff_id')->references('id')->on('staffs')->onDelete('No Action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('depositors');
    }
}
