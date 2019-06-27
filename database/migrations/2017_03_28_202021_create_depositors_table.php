<?php

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
            $table->integer('package_id');
            $table->integer('staff_id');
            $table->string('depositor_number');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('spouse_name');
            $table->string('email_name');
            $table->string('phone_number');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('birth_date');
            $table->text('present_address');
            $table->text('permanent_address');
            $table->string('emergency_name');
            $table->string('emergency_relationship');
            $table->text('emergency_address');
            $table->string('emergency_phone');
            $table->string('depositor_image');
            $table->string('nid_image');
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
        Schema::drop('depositors');
    }
}
