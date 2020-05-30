<?php

use Illuminate\Support\Facades\Schema;
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
            $table->unsignedInteger('currency_id');
            $table->integer('amount');
            $table->integer('installment');
            $table->integer('percentage');
            $table->integer('fine');
            $table->string('type');
            $table->unsignedInteger('depositor_id');
            $table->unsignedInteger('borrower_id');
            $table->timestamps();

            $table->foreign('currency_id')->references('id')->on('currencies')->onDelete('No Action');
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
        Schema::drop('deposit_packages');
    }
}
