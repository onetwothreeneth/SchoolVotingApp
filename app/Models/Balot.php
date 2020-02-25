<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Balot extends Model
{
	protected $table = 'balots';

	protected $fillable = [
		'election_id','user_id','candidate_id','position','gradelevel','section','schedule','status'
	];
}
