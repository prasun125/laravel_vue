<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCitiesTable1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tp_cities', function (Blueprint $table) {
	        $table->string('city_full_name')->after('city_name');
	        $table->string('description')->after('attraction');
	        $table->binary('city_data')->after('description');
	        $table->string('nearest_address')->after('city_full_name');

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
