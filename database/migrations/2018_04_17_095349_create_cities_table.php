<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tp_cities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('city_name');
            $table->unsignedInteger('country_id');
            $table->string('place_id');
            $table->string('latitude');
            $table->string('longitude');
            $table->timestamps();
	
	        $table->foreign('country_id')->references('id')->on('tp_countries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tp_cities');
    }
}
