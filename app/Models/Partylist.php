<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partylist extends Model
{
	protected $table = 'partylists';

	protected $fillable = [
		'election_id','name','vision','status'
	];
}
