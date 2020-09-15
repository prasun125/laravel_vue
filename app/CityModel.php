<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CityModel extends Model
{
	protected $table = 'tp_cities';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'city_name', 'city_full_name', 'nearest_address', 'country_id', 'place_id', 'latitude', 'longitude', 'suggested_destination', 'attraction', 'description', 'city_data'
	];
}
