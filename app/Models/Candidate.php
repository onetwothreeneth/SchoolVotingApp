<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
	protected $table = 'candidates';

	protected $fillable = [
		'student_id','partylist_id','position_id','photo','intro','gpa','file_coc','file_grade','file_goodmoral','file_consent','status'
	];

	public function party()
	{
		$relation = $this->belongsTo('App\Models\Partylist','partylist_id','id')->first();

		return $relation->name;
	}
}
