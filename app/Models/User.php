<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;  
use Illuminate\Foundation\Auth\User as Authenticatable; 

class User extends Authenticatable
{
  	use Notifiable;
  	
	protected $table = 'users';

	protected $fillable = [
		'name','username','password','default','email','img','token','status','type'
	];
}
