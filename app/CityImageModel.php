<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CityImageModel extends Model
{
	protected $table = 'tp_cities_images';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'city_id', 'city_image_file_id'
	];
}
