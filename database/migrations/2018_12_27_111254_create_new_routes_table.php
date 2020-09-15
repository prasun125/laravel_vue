<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tp_new_routes', function (Blueprint $table) {
            $table->increments('id');
	        $table->string('route_title')->nullable();
	        $table->unsignedInteger('user_id');
	        $table->date('start_date');
	        $table->date('end_date');
	        $table->unsignedInteger('vehicle_id');
	        $table->integer('adult');
	        $table->integer('child');
	        $table->float('total_price');
	        $table->enum('status', ['Predefined', 'Userdefined']);
	        $table->jsonb('cities');
            $table->timestamps();
	
	        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
	        $table->foreign('vehicle_id')->references('id')->on('tp_vehicles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tp_new_routes');
    }
}
