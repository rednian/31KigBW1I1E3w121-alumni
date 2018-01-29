<?php

namespace Alumni;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    
	protected $table 		= "posts";
	protected $primaryKey 	= "post_id";

	public function company(){
		return $this->belongsTo('Alumni\Company', 'company_id');
	}

	public function comments(){
		return $this->hasMany('Alumni\Comments', 'post_id');
	}

}
