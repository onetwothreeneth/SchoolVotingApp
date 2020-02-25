<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
	protected $table = 'elections';

	protected $fillable = [
		'schoolyear','voting_end','voting_start','status'
	];

	public static function isStarted()
	{
		$date = Carbon::now('Asia/Singapore');
		$checker = self::where('voting_start','<=',$date)
					   ->where('voting_end','>=',$date)
					   ->whereStatus(1);

		if($checker->count() != 0){
			return true;
		}

		return false;
	}

	public static function upComming()
	{
		$date = Carbon::now('Asia/Singapore');
		$checker = self::where('voting_start','>=',$date) 
					   ->whereStatus(1);

		if($checker->count() != 0){
			return $checker->first()->voting_start;
		}

		return false;
	}
	
	public function sy()
	{
		$relation = $this->belongsTo('App\Models\Sy','schoolyear','id');

		return ($relation->count() != 0) ? $relation->first()->sy_start.' - '.$relation->first()->sy_end : 'Invalid Sy ID';

	}
}
