<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleModel extends Model
{
	protected $table = 'tp_vehicles';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'car_image_id', 'car_name', 'driver_inclusion', 'passenger', 'door', 'bag', 'description', 'inclusion', 'price'
	];
}
