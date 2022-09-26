<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Countries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 
        Schema::create('countries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('country', 100);
            $table->string('code', 30);
            $table->tinyInteger('status');
            $table->timestamps();
            // $table->foreignId('code');
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
        Schema::dropIfExists('countries');
    }
}
