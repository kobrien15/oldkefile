<?php


class Party extends Eloquent
{
	protected $table = 'parties';


    public function courtcases()
    {
    	return $this->hasMany('CourtCase');
    }
	
}