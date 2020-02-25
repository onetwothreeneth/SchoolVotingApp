<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
	protected $table = 'schedules';

	protected $fillable = [
		'type','sched_start','sched_end','status'
	];

	public static function available()
	{
		$checker = self::whereStatus(1)->count();

		return $checker != 0 ? true : false;
	} 
}
