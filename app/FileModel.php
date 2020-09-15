<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileModel extends Model
{
	protected $table = 'tp_files';
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'file_name', 'file_path', 'file_type'
	];
}
