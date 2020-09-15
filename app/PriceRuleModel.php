<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PriceRuleModel extends Model
{
	protected $table = 'tp_price_rules';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'min_distance', 'max_distance', 'min_hour', 'max_hour', 'cost'
	];
}
