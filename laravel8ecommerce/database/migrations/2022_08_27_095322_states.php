<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class States extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('states', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('state', 50);
            $table->bigInteger('country_key')->unsigned()->index();
            $table->tinyInteger('status')->default(1);
            $table->index('state'); 
            $table->timestamps();
            $table->foreign('country_key')->references('id')->on('countries');
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
        Schema::dropIfExists('states');
    }
}
