<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
	protected $table = 'sections';

	protected $fillable = [
		'gradelevel_id','name','status'
	];

	public static function available()
	{
		$checker = self::whereStatus(1)->count();

		return $checker != 0 ? true : false;
	}

	public function level()
	{
		$relation = $this->belongsTo('App\Models\Level','gradelevel_id','id')->first();

		return $relation->level;
	}
}
