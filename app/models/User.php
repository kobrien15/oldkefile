<?php

use Zizaco\Confide\ConfideUser;
use LaravelBook\Ardent\Ardent;
use Zizaco\Entrust\HasRole;

class User extends ConfideUser {

	use HasRole;
	protected $table = 'users';
	protected $fillable = ['username', 'password', 'email', 'bar_number', 'display_name'];
	public static $rules = array(
	    'username' => 'unique:users,username',
	    'email' => 'unique:users,email',
	);

	public function uploads()
  	{
  		return $this->hasMany('Upload');
  	}

  	public function courtcases()
  	{
  		return $this->hasMany('CourtCase')->orderBy('updated_at', 'desc');
  	}
}