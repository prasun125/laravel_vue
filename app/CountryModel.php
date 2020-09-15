<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CountryModel extends Model
{
	protected $table = 'tp_countries';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'country_name'
	];
}
