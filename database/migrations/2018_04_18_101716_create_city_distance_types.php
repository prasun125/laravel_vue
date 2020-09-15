<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCityDistanceTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('tp_city_distance_types', function (Blueprint $table) {
		    $table->increments('id');
		    $table->string('city_from');
		    $table->string('city_to');
		    $table->integer('distance');
		    $table->string('time');
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
	    Schema::dropIfExists('tp_city_distance_types');
    }
}
