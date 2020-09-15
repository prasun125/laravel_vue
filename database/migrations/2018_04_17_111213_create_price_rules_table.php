<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePriceRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tp_price_rules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('min_distance');
            $table->string('max_distance');
            $table->string('min_hour');
            $table->string('max_hour');
            $table->integer('cost');
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
        Schema::dropIfExists('tp_price_rules');
    }
}
