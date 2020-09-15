<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tp_cities_images', function (Blueprint $table) {
            $table->increments('id');
	        $table->unsignedInteger('city_id');
	        $table->unsignedInteger('city_image_file_id');
	        $table->timestamps();
	
	        $table->foreign('city_id')->references('id')->on('tp_cities')->onDelete('cascade');
	        $table->foreign('city_image_file_id')->references('id')->on('tp_files')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tp_cities_images');
    }
}
