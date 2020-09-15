<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTpRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tp_routes', function (Blueprint $table) {
            $table->integer('total_travellers')->after('total_no_of_nights')->nullable();
            $table->string('vehicle_type')->after('total_travellers')->nullable();
            $table->boolean('airport_pickup')->after('vehicle_type')->nullable();
            $table->enum('booking_status', ['Confirmed', 'Pending'])->after('status');
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
