<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	protected $table = 'students';

	protected $fillable = [
		'user_id','section_id','lrn','email','schoolyear','fname','mname','lname','age','gender', 'address','parent','active','default','status'
	];

	public static function available()
	{
		$checker = self::whereStatus(1)->count();

		return $checker != 0 ? true : false;
	}

	public function sy()
	{
		$relation = $this->belongsTo('App\Models\Sy','schoolyear','id');

		return ($relation->count() != 0) ? $relation->first()->sy_start.' - '.$relation->first()->sy_end : 'Invalid Sy ID';

	}

	public function section()
	{
		$relation = $this->belongsTo('App\Models\Section');

		return ($relation->count() != 0) ? $relation->first()->name : 'Invalid Section ID';
	}
}
