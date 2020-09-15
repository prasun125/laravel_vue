<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsLettersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_letters', function (Blueprint $table) {
	        $table->increments('id');
	        $table->string('first_name');
	        $table->string('last_name');
	        $table->string('email')->unique();
	        $table->string('planning_for');
	        $table->enum('days', ['2-4', '5-8', '9-13', '14+']);
	        $table->string('special_request')->nullable();
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
        Schema::dropIfExists('news_letters');
    }
}
