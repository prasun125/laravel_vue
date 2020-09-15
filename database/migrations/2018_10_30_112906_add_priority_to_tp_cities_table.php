<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPriorityToTpCitiesTable extends Migration
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
			    if (Schema::hasColumn('tp_cities', 'suggested_destination'))
			    {
				    $table->boolean('priority')->default(0)->after('suggested_destination')->nullable();
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
        //
    }
}
