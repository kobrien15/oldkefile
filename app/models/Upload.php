<?php


class Upload extends Eloquent
{
	protected $table = 'uploads';

	public function courtcase()
    {
    	return $this->belongsTo('CourtCase');
    }
	
	public function user()
    {	
        return $this->belongsTo('User');
    }  


}