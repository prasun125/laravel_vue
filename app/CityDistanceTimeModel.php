<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CityDistanceTimeModel extends Model
{
	protected $table = 'tp_city_distance_types';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'city_from', 'city_to', 'distance', 'time'
	];
}
