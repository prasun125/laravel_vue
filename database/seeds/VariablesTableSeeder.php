<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VariablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $variables = [
        	[
        		'name' => 'cost_per_night',
		        'value' => 100
	        ],
	        [
		        'name' => 'cost_of_airport_pickup',
		        'value' => 25
	        ],
	        [
		        'name' => 'deposit',
		        'value' => 100
	        ]
        ];
	    DB::table('tp_variables')->insert($variables);
    }
}
