<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
	protected $table = 'gradelevels';

	protected $fillable = [
		'level','schedule_id','status'
	];

	public static function available()
	{
		$checker = self::whereStatus(1)->count();

		return $checker != 0 ? true : false;
	}

	public function schedule()
	{
		$relation = $this->belongsTo('App\Models\Schedule')->first();

		return date('h:i A',strtotime($relation->sched_start)).' - '.date('h:i A',strtotime($relation->sched_end)).' ('.$relation->type.' shift)';
	}
}
