<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTravellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tp_travellers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->enum('salutation', ['Mr.', 'Mrs.']);
            $table->string('first_name');
            $table->string('last_name');
            $table->string('mobile_no');
            $table->longText('address');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('booking_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('booking_id')->references('id')->on('tp_bookings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('travellers');
    }
}
