<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Cities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('cities', function (Blueprint $table) {
            $table->bigIncrements('city_key');
            $table->string('city', 50);
            $table->string('state_key', 50);
            $table->tinyInteger('status')->default(1);
            $table->index('city');
            $table->timestamps();
            $table->foreign('state_key')->references('id')->on('states');
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
        Schema::dropIfExists('cities');
    }
}
