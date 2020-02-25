<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sy extends Model
{
	protected $table = 'schoolyears';

	protected $fillable = [
		'sy_start','sy_end','status'
	];
	
	public static function available()
	{
		$checker = self::whereStatus(1)->count();

		return $checker != 0 ? true : false;
	}
}
