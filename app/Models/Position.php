<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
	protected $table = 'positions';

	protected $fillable = [
		'name','eligibility','status'
	];

	public static function available()
	{
		$checker = self::whereStatus(1)->count();

		return $checker != 0 ? true : false;
	}

	public function level()
	{
		$relation = $this->belongsTo('App\Models\level','eligibility','id');

		return $relation->count() == 0 ? 'ALL' : 'Grade '.$relation->first()->level.' Only';
	}
}
