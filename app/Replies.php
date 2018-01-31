<?php

namespace Alumni;

use Illuminate\Database\Eloquent\Model;


class Replies extends Model
{
    protected $table = "replies";
    protected $primaryKey = "reply_id";


    public function company_info(){
    	
    	return $this->belongsTo('Alumni\Company', 'company_id');

    }

    public function alumnus_info(){
    	
    	return $this->belongsTo('Alumni\Stud_sch_info', 'ssi_id');

    }

}
