<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepositPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deposit_packages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('currency_id');
            $table->integer('amount');
            $table->integer('installment');
            $table->integer('percentage');
            $table->integer('fine');
            $table->string('type');
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
        Schema::drop('deposit_packages');
    }
}
