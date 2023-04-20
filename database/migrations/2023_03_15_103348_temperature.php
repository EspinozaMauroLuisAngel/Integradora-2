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
        Schema::create('temperature', function (Blueprint $table) {
            $table->increments('id');
            $table->string('grados');
            $table->string('location');

            $table->unsignedInteger('fan_id')->nullable();              
            $table->foreign('fan_id')->references('id')->on('fan');

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
