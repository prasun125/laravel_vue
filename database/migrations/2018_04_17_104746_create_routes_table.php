<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tp_routes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('route_title');
	        $table->integer('reference_id')->nullable();
	        $table->unsignedInteger('user_id')->nullable();
	        $table->float('total_price');
	        $table->date('start_date');
	        $table->date('end_date');
	        $table->integer('total_no_of_nights');
	        $table->enum('status', ['Predefined', 'Userdefined']);
            $table->timestamps();
	
	        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tp_routes');
    }
}
