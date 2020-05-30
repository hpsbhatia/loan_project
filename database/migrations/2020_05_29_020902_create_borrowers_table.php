<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBorrowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrowers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->comment('borrower is user and borrower uses user information');
            $table->string('number');
            $table->integer('salary');
            $table->integer('other_income');
            $table->integer('salary_spouse');
            $table->float('rating');
            $table->string('document_path');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('No Action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borrowers');
    }
}
