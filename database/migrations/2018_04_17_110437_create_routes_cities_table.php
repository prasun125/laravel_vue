<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoutesCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tp_routes_cities', function (Blueprint $table) {
            $table->increments('id');
	        $table->unsignedInteger('city_id');
	        $table->float('price');
	        $table->string('distance');
	        $table->unsignedInteger('route_id');
	        $table->enum('status', ['Created', 'Active', 'Inactive', 'Completed', 'Resceduled']);
	        $table->integer('no_of_city');
	        $table->boolean('leave_same_day');
	        $table->date('start_date');
	        $table->date('end_date');
            $table->timestamps();
	
	        $table->foreign('city_id')->references('id')->on('tp_cities')->onDelete('cascade');
	        $table->foreign('route_id')->references('id')->on('tp_routes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tp_routes_cities');
    }
}
