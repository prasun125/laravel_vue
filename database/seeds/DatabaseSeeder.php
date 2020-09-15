<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
	    DB::table('users')->insert([
	    	'first_name' => 'admin',
	    	'last_name' => 'admin',
		    'email' => 'admin@example.com',
		    'password' => bcrypt('admin'),
		    'role' => 'Administrator'
	    ]);

	    DB::table('tp_countries')->insert([
		    'country_name' => 'Cuba'
	    ]);

	    $this->call(VariablesTableSeeder::class);
    }
}
