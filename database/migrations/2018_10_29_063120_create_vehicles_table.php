<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tp_vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('vehicle_image_id');
            $table->string('vehicle_name');
            $table->boolean('driver_inclusion')->default(0);
            $table->integer('passenger')->nullable();
            $table->integer('door')->nullable();
            $table->integer('bag')->nullable();
	        $table->longText('description')->nullable();
	        $table->jsonb('inclusion')->nullable();
	        $table->float('price')->nullable();
            $table->timestamps();
	
	        $table->foreign('vehicle_image_id')->references('id')->on('tp_files')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tp_vehicles');
    }
}
