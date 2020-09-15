<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsLetter extends Model
{
	protected $fillable = [
		'first_name', 'last_name', 'email', 'planning_for', 'days', 'special_request'
	];
}
