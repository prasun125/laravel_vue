<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTpUserRouteAddonCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tp_user_route_addon_cities', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('from_route_id');
            $table->unsignedInteger('to_route_id');
            $table->unsignedInteger('city_id');
            $table->unsignedInteger('priority');

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
        Schema::dropIfExists('tp_user_route_addon_cities');
    }
}
