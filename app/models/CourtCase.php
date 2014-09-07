<?php

// app/models/CourtCase.php

class CourtCase extends Eloquent
{
	protected $table = 'cases';

	public function uploads()
    {
    	return $this->hasMany('Upload');
    }

    public function users()
    {
    	return $this->belongsTo('User');
    }
	
    public function parties()
    {
        return $this->hasMany('Party');
    }

}