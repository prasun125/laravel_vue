<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterVariablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::table('tp_variables', function (Blueprint $table) {
		    $table->dropColumn('km_per_day');
		    $table->dropColumn('cost_of_one_night');
		    $table->string('name')->after('id');
		    $table->string('value')->after('name');
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
