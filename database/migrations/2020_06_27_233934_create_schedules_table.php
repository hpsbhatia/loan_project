<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('borrower_id')->comment('borrower of each schedule');
            $table->unsignedInteger('depositor_id')->comment('depositor of each schedule');
            $table->string('date');
            $table->tinyInteger('status');
            $table->tinyInteger('pay_status');
            $table->tinyInteger('paid_status');
            $table->timestamps();

            $table->foreign('borrower_id')->references('id')->on('borrowers')->onDelete('No Action');
            $table->foreign('depositor_id')->references('id')->on('depositors')->onDelete('No Action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('schedules');
    }
}
