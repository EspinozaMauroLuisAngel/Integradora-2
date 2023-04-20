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
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('foto')->nullable();
            $table->string('name');
            $table->string('lastname');
            $table->date('date');
            $table->string('email');
            $table->string('password');
            $table->string('role')->nullable();

            $table->unsignedInteger('temperature_id')->nullable();              
            $table->foreign('temperature_id')->references('id')->on('temperature')->onDelete('cascade');

            $table->unsignedInteger('humidity_id')->nullable();              
            $table->foreign('humidity_id')->references('id')->on('humiditie')->onDelete('cascade');

            $table->unsignedInteger('lightning_id')->nullable();              
            $table->foreign('lightning_id')->references('id')->on('lightning')->onDelete('cascade');

            $table->SoftDeletes();
            $table->rememberToken();
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
        //
    }
};
