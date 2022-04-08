<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apllications_hot', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('operator_id')->nullable();
            $table->unsignedBigInteger('magazine_id');
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('violation_id');
            $table->text('comment')->nullable();
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('operation_response');
            $table->text('logs')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('operator_id')->references('id')->on('users');
            $table->foreign('magazine_id')->references('id')->on('magazines')->onDelete('cascade');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('violation_id')->references('id')->on('violations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apllications_hot');
    }
};
