<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSuggestedDestinationToTpCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tp_cities', function (Blueprint $table) {
            if (Schema::hasTable('tp_cities'))
            {
                if (Schema::hasColumn('tp_cities', 'city_name'))
                {
                    $table->boolean('suggested_destination')->default(0)->after('longitude')->nullable();
                }
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tp_cities', function (Blueprint $table) {
            //
        });
    }
}
